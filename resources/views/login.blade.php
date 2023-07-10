@extends('layouts.public')

@section('body')   
    <div class="row justify-content-center">
        <div class="card col-sm-12 col-md-6 mt-5">
            <div class="card-header">
                <h5>Log in</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('authenticate') }}" method="GET">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form2Example1" class="form-control" name="email"/>
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>
                
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form2Example2" class="form-control" name="password" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>
                        
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>      
                
                </form>
            </div>
        </div>
    </div>
@endsection