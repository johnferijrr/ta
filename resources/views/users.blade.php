@extends('auth.layouts')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">User List</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userss as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->photo)
                        <img src="{{ asset('storage/'.$user->photo) }}" width="100px" class="img-thumbnail">
                    @else
                        <img src="{{ asset('noimage.jpg') }}" width="100px" class="img-thumbnail">
                    @endif
                </td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection