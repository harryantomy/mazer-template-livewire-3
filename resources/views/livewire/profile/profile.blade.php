<div>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Account Profile</h3>
                    <p class="text-subtitle text-muted">A page where users can change profile information</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <livewire:profile.photo-profile>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit="updateProfile">
                                <div class="form-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="Your Phone" wire:model='username'>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Your Name" wire:model='name'>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="Your Email" wire:model='email'>
                                </div>
                                {{-- password --}}
                                {{-- current password --}}
                                <div class="form-group">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control" placeholder="Your Current Password"
                                        wire:model='currentPassword'>
                                    @error('currentPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Your Password" wire:model='newPassword'>
                                    <small class="text-muted">
                                        Kosongkan Jika Tidak Ingin Mengganti Password</small><br>
                                    @error('newPassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Confirm Password"
                                        wire:model='newPassword_confirmation'>
                                    <small class="text-muted">
                                        Kosongkan Jika Tidak Ingin Mengganti Password</small>
                                    @error('newPasswordConfirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <button type="submit" class="text-white btn btn-primary">Save Changes
                                        <div wire:loading>
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
