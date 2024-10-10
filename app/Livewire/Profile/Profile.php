<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class Profile extends Component
{
    public $username, $name, $email, $currentPassword, $newPassword, $newPassword_confirmation;


    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }
    public function render()
    {
        return view('livewire.profile.profile');
    }

    public function updateProfile()
    {

        $user = auth()->user();
        $this->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],

        ]);

        $user->username = $this->username;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        if ($this->currentPassword) {
            try {
                $validated = $this->validate([
                    'currentPassword' => ['required', 'string', 'currentPassword'],
                    'newPassword' => ['required', 'string', Password::defaults(), 'confirmed'],
                ]);

                if (!Hash::check($this->currentPassword, $user->password)) {
                    $this->addError('currentPassword', 'The current password is incorrect.');
                    return;
                }
            } catch (ValidationException $e) {
                $this->reset('currentPassword', 'newPassword', 'newPassword_confirmation');

                throw $e;
                $this->dispatch('showToast', type: 'error', message: $e->getMessage());
            }
            $user->update([
                'password' => bcrypt($validated['newPassword']),
            ]);

            $this->reset('currentPassword', 'newPassword', 'newPassword_confirmation');
        }

        $this->dispatch('profileUpdated');
        $this->dispatch('showToast', type: 'success', message: 'Profile updated successfully');
    }
}