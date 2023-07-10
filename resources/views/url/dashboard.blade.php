@extends('layouts.public')
@section('body')
<style>
    svg{ 
        height: 15px !important;
    }
</style>
    <div class="row">
        @if ($urls)
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>               
                    <th scope="col">URL</th>
                    <th scope="col">Custom Alias</th>
                    <th scope="col">Redirect Link</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Analytics</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($urls as $url)
                    <tr>
                        <td>{{$url->url}}</td>
                        <td>{{$url->custom_alias}}</td>
                        <td><a href="{{ route('redirect',  ['userId' => \Auth::user()->id, 'string' => $url->string]) }}" target="_blank">Go to URL</a></td>
                        <td><a href="{{ route('url-shortener.edit',  ['urlShortenerId' => $url->id]) }}" ><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="{{ route('url-shortener.analytics',  ['urlShortenerId' => $url->id]) }}" href=""><i class="fa-solid fa-chart-line"></i></i></a></td>                    
                    </tr>
                    @endforeach             
                </tbody>
            </table>
        </div>
        {{$urls}}
        @else
            <h5>You didn't add any custom URL</h5>
        @endif
    </div>
@endsection