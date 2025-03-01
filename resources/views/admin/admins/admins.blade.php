@extends('admin.layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Admins</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">email</th>
                                <th scope="col">remove</th>
                            </tr>
                        </thead>
                        @forelse($admins as $admin)
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $admin->id }}</th>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <form method="post" action="{{ route('admins.update', $admin->id) }}">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-danger btn-sm">Remove from Admins</button>
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