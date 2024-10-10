<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoProfile extends Component
{
    use WithFileUploads;

    public $photo;

    protected $rules = [
        'photo' => 'image|max:1024', // 1MB Max
    ];

    protected $messages = [
        'photo.image' => 'The photo must be an image.',
        'photo.max' => 'The photo may not be greater than 1MB.',
    ];

    protected $listeners = ['profileUpdated' => '$refresh'];

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }

    public function save()
    {
        $this->validate();

        $user = auth()->user();

        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
        }

        $this->photo->storeAs(path: 'public/profile', name: auth()->id() . '.' . $this->photo->getClientOriginalExtension());
        $path = 'public/profile/' . auth()->id() . '.' . $this->photo->getClientOriginalExtension();
        $user->profile_photo_path = $path;
        $user->save();
        $this->dispatch('photoUpdated');
        $this->dispatch('showToast', type: 'success', message: 'Photo profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.profile.photo-profile');
    }
}
