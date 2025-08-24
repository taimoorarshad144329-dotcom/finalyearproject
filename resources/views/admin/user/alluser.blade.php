@extends('admin.adminlayout')

@section('content')

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">
        List of Admins
    </p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <th scope="row">{{ $admin->id }}</th>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-info">
                        <i class="fas fa-pen"></i>
                    </a>
                
                    <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="d-inline"> 
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure?')">
                            <i class="far fa-trash-alt"></i>  
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('admins.create') }}" class="btn btn-danger box">
    <i class="fas fa-plus fa-2x"></i>
</a>

@endsection
