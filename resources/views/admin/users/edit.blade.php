@extends('admin.partials.master')
@section('title', 'Edit User')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Edit User</strong></h1>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="name" class="form-control" 
                               value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" 
                               value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Password <small class="text-muted">(kosongkan jika tidak ingin diubah)</small></label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Avatar</label>
                        <input type="file" name="avatar" class="form-control" accept="image/*">
                        
                        @if($user->avatar)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$user->avatar) }}" alt="Avatar" class="img-thumbnail" width="120">
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
