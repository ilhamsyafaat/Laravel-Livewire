<div>
    <div class="card">
        <div class="card-header">Form Edit</div>
        <div class="card-body">
            <form wire:submit.prevent="update">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>    
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>    
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" wire:model="photo">
                    @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>    
                    @enderror

                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" alt="Photo Preview" width="100">
                    @elseif ($photo_old)
                        <img src="{{ Storage::url($photo_old) }}" alt="Current Photo" width="100">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>    
            </form>
        </div>
    </div>
</div>
