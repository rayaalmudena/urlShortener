@extends('layouts.public')
@section('body')
<div class="row justify-content-center">
    <div class="card col-sm-12 col-md-8 mt-5">
        <div class="card-header">
            <h5>Analytics of:</h5>
            <p>
                <span style="font-weight: bold;">Original URL:</span>
                <br>
                {{$url->url}}
            </p>
            <p>
                <span style="font-weight: bold;">Custom Alias:</span>
                <br>
                {{$url->custom_alias ?? 'Null'}}
            </p>
            <p>
                <span style="font-weight: bold;">Url Shortner:</span>
                <br>
                <a href="{{ route('redirect',  ['userId' => \Auth::user()->id, 'string' => $url->string]) }}" target="_blank">{{ route('redirect',  ['userId' => \Auth::user()->id, 'string' => $url->string]) }}</a>
            </p>
            @if($url->custom_alias)
                <p>
                    <span style="font-weight: bold;">Url Shortner with custom alias:</span>
                    <br>
                    <a href="{{ route('redirect',  ['userId' => \Auth::user()->id, 'string' => $url->custom_alias]) }}" target="_blank">{{ route('redirect',  ['userId' => \Auth::user()->id, 'string' => $url->custom_alias]) }}</a>
                </p>
            @endif
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center active">
                  Today
                  <span class="badge badge-primary badge-pill">{{$data['today']}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Last week
                  <span class="badge badge-primary badge-pill text-black">{{$data['last_week']}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Last month
                  <span class="badge badge-primary badge-pill text-black">{{$data['last_month']}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Last year
                    <span class="badge badge-primary badge-pill text-black">{{$data['last_year']}}</span>
                </li>
              </ul>
        </div>
    </div>
</div>
@endsection