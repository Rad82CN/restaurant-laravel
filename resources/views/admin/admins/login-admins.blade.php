@extends('admin.layouts.layout')

@section('content')

<div class="container-fluid"> 
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mt-5">Login</h5>
          <form method="post" class="p-auto" action="{{ route('admin.login') }}">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label for="email">Admin Email</label>
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email"/>
            </div>
            @error('email')
            <span class="d-block mt-2 mb-2 fs-6 text-danger"> {{ $message }} </span>
            @enderror

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label for="password">Admin Password</label>
              <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control"/>
            </div>
            @error('password')
            <span class="d-block mt-2 mb-2 fs-6 text-danger"> {{ $message }} </span>
            @enderror

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login as Admin</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection