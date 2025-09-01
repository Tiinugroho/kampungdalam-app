@extends('admin.partials.master')
@section('title', 'Data User')
@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Data User</strong></h1>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Daftar User</span>
                <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Tambah User</a>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Verifikasi Email</th>
                            <th>Dibuat Pada</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                                <td class="text-center">
                                    @if($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" 
                                             alt="avatar" width="40" height="40" 
                                             class="rounded-circle">
                                    @else
                                        <span class="badge bg-secondary">No Avatar</span>
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-{{ $user->role == 'super-admin' ? 'danger' : 'info' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    @if($user->email_verified_at)
                                        <span class="badge bg-success">Terverifikasi</span>
                                    @else
                                        <span class="badge bg-warning">Belum</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" 
                                       class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                          method="POST" class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data user</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>
</main>
@endsection
