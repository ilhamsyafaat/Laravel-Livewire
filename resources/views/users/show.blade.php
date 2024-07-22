@extends('layouts.master')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('users.home') }}" class="text-primary">Back</a>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" value="{{ $user->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="text" class="form-control" value="{{ $user->email }}" disabled>
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <div>
            @if ($user->photo)
                <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->name }}" class="img-thumbnail" width="100">
            @else
                <p>Tidak ada Photo</p>
            @endif
        </div>
    </div>
</div>
@endsection