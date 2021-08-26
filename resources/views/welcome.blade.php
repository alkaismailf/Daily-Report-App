@extends('layouts.body')

@section('content')
<div class="content" style="transform: translate(0, 250%)">
    <div class="d-flex justify-content-center">
        <h1><b>Daily Report App</b></h1>
        <br>
    </div>   
    <div class="d-flex justify-content-center">
        @if (\Auth::user()->role == 'manajer')
        <a href="{{ url('/report') }}" class="mr-3">Task Report</a>
        <a href="{{ url('/reportall') }}">Task Report Keseluruhan</a>
        @else
        <a href="{{ url('/report') }}">Task Report</a>
        @endif
        {{-- <a href="https://laracasts.com">Laracasts</a>
        <a href="https://laravel-news.com">News</a>
        <a href="https://blog.laravel.com">Blog</a>
        <a href="https://nova.laravel.com">Nova</a>
        <a href="https://forge.laravel.com">Forge</a>
        <a href="https://vapor.laravel.com">Vapor</a>
        <a href="https://github.com/laravel/laravel">GitHub</a> --}}
    </div>
</div>         
@endsection