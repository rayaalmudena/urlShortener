@extends('layouts.public')

@section('body')
<div class="row justify-content-center">
    <div class="card col-sm-12 col-md-6 mt-5">
        <div class="card-body">            
            <div class="m-2">
                <h2 class="mt-6 text-center text-danger"> <i class="fa-solid fa-circle-exclamation fa-xl"></i>  {{$message}}</h2>                    
            </div>            
        </div>  
    </div>
</div>    
@endsection