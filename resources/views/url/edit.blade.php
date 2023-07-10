@extends('layouts.public')
@section('body')
    <div class="row justify-content-center">
        <div class="card col-sm-12 col-md-6 mt-5">
            <div class="card-header">
                @isset ($url)
                    <h5>Edit URL Shortener</h5>
                @else
                    <h5>Save new URL Shortener</h5>
                @endisset
                
            </div>
            <div class="card-body">
                <form action="{{ route('url-shortener.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{old('id', $url->id ?? '')}}" />
                    <!-- URL input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example1" class="form-control" name="url" value="{{old('url', $url->url ?? '')}}" required  />
                        <label class="form-label" for="form2Example1">URL</label>
                    </div>
                
                    <!-- Custom Alias Input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form2Example2" class="form-control" name="custom_alias" value="{{old('custom_alias', $url->custom_alias ?? '')}}" />
                        <label class="form-label" for="form2Example2">Custom Alias</label>
                    </div>
                        
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>      
                
                </form>
            </div>
        </div>
    </div>
@endsection