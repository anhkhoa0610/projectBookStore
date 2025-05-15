@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            {{-- Flash Messages --}}
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>User List</h4>
                    <a href="{{ route('user.createUser') }}" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i> Add User
                    </a>
                </div>

                <div class="card-body">
                    {{-- Search & Filter --}}
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <form action="{{ route('user.list') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search users" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    @if(request('search'))
                                        <a href="{{ route('user.list') }}" class="btn btn-outline-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>

                        <div class="col-md-3">
                            <form action="{{ route('user.list') }}" method="GET">
                                <select name="role" class="form-select" onchange="this.form.submit()">
                                    <option value="">All Roles</option>
                                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="manager" {{ request('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                    <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                                @if(request('search'))
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                @endif
                            </form>
                        </div>
                    </div>

                    {{-- User Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Date of Birth</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->full_name }}</td>
                                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                        <td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
                                        <td>{{ Str::limit($user->address, 30) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($user->dob)->format('d/m/Y') }}</td>
                                        <td>
                                            <span class="badge bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'manager' ? 'warning' : 'info') }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input toggle-status"
                                                       data-user-id="{{ $user->id }}"
                                                       {{ $user->is_active ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('user.readUser', $user->id) }}" class="btn btn-sm btn-info" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('user.updateUser', $user->id) }}" class="btn btn-sm btn-success" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-user-id="{{ $user->id }}"
                                                    data-user-name="{{ $user->full_name }}"
                                                    onclick="return confirmDelete('{{ $user->full_name }}', '{{ route('user.destroy', ['id' => $user->id]) }}')">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                @push('scripts')
                                                <script>
                                                    function confirmDelete(userName, deleteUrl) {
                                                        if (confirm('Bạn có chắc muốn xóa user "' + userName + '" không?')) {
                                                            let form = document.createElement('form');
                                                            form.method = 'POST';
                                                            form.action = deleteUrl;

                                                            // CSRF token
                                                            let csrf = document.createElement('input');
                                                            csrf.type = 'hidden';
                                                            csrf.name = '_token';
                                                            csrf.value = '{{ csrf_token() }}';
                                                            form.appendChild(csrf);

                                                            let method = document.createElement('input');
                                                            method.type = 'hidden';
                                                            method.name = '_method';
                                                            method.value = 'DELETE';
                                                            form.appendChild(method);

                                                            document.body.appendChild(form);
                                                            form.submit();
                                                        }
                                                        return false;  
                                                    }
                                                </script>
                                                @endpush

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div>{{ $users->links() }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@stack('scripts')
@push('styles')
<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .form-switch {
        justify-content: center;
    }
    .btn-group {
        gap: 4px;
    }
</style>
@endpush

{{-- Bootstrap JS (only include if not already loaded globally) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>