@extends('admin.layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Users</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">email</th>
                                <th scope="col">Convert</th>
                            </tr>
                        </thead>
                        @forelse($users as $user)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form method="post" action="{{ route('users.update', $user->id) }}">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-info btn-sm">Convert to an Admin</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <p class="text-center mt-3">No results has been found!</p>
                        @endforelse
                            
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection