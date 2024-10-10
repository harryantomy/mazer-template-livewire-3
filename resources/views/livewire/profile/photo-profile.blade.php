<div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <div class="">
                    @if ($photo)
                        <img class="rounded img-fluid " src="{{ $photo->temporaryUrl() }}" alt="Preview" width="200px">
                    @elseif (auth()->user()->profile_photo_path)
                        <img class="rounded img-fluid " src="{{ Storage::url(auth()->user()->profile_photo_path) }}"
                            alt="Avatar" width="200px">
                    @else
                        <img class="rounded img-fluid " src="{{ asset('assets/compiled/jpg/2.jpg') }}" alt="Avatar"
                            width="200px">
                    @endif
                </div>
                <h3 class="mt-3">{{ Auth::user()->name }}</h3>
                <p class="text-small">{{ ucwords(Auth::user()->roles->first()->name) }}</p>
            </div>
            <div>
                <form wire:submit='save'>
                    <div class="form-group">
                        <label for="formFileSm" class="form-label">Foto Profil</label>
                        <input class="mb-1 form-control form-control-sm" id="photo_profile" type="file"
                            wire:model='photo'>
                        <div wire:loading wire:target="photo">
                            Uploading... <span class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                        </div>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="text-white btn btn-primary btn-block">Save
                            <div wire:loading wire:target='save'>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
