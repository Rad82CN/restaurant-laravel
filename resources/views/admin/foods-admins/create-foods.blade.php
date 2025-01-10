@extends('admin.layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Food Items</h5>
                    <form method="POST" action="{{ route('adminFoods.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name"/>
                        </div>
                        @error('name')
                            <span class="d-block mt-2 mb-2 fs-6 text-danger"> {{ $message }} </span>
                        @enderror
    
                        <div class="form-outline mb-4 mt-4">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price"/>
                        </div>
                        @error('price')
                            <span class="d-block mt-2 mb-2 fs-6 text-danger"> {{ $message }} </span>
                        @enderror
    
                        <div class="form-outline mb-4 mt-4">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="form2Example1" class="form-control"/>
                        </div>
                        @error('image')
                            <span class="d-block mt-2 mb-2 fs-6 text-danger"> {{ $message }} </span>
                        @enderror
    
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        @error('description')
                            <span class="d-block mt-2 mb-2 fs-6 text-danger"> {{ $message }} </span>
                        @enderror
                        
                        <div class="form-outline mb-4 mt-4">
                            <select name="category" class="form-select  form-control" aria-label="Default select example">
                                <option value="breakfast">Breakfast</option>
                                <option value="launch">Launch</option>
                                <option value="dinner">Dinner</option>
                            </select>
                        </div>
                        @error('category')
                            <span class="d-block mt-2 mb-2 fs-6 text-danger"> {{ $message }} </span>
                        @enderror
    
                        <br>
                        
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary  mb-4 text-center">create</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection