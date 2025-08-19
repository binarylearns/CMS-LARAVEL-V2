@extends('dashboardlayout.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg border-0 bg-dark text-white rounded-3">
                <div class="card-header bg-black">
                    <h4 class="mb-0">Edit Profile</h4>
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Change Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control bg-secondary text-white @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Change Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control bg-secondary text-white @error('password') is-invalid @enderror" 
                                   id="password" name="password" placeholder="Leave blank to keep current password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control bg-secondary text-white" 
                                   id="password_confirmation" name="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Update Profile</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
