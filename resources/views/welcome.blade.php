@extends('layouts.public')

@section('body')
    <div class="row justify-content-center">
        <div class="card col-sm-12 col-md-6 mt-5">
            <div class="card-body">
                <a href="{{ route('login') }}" class="link-offset-2 link-underline link-underline-opacity-0">
                    <div class="m-2">
                        <h2 class="mt-6 text-center"> <i class="fa-solid fa-link fa-xl"></i>  Url Shortner</h2>

                        <p class="mt-4">
                            This is a small test done in Laravel to create shorter URLs or in other words, redirects from this project to the wished URL.
                        </p>
                    </div>
                </a>
            </div>  
        </div>
    </div>    
@endsection