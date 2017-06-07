@extends('layouts.app')


@section('content')
    <div id="welcome">
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    Hippy Trippers
                </div>

                <div class="links">
                    <a href="{{ url('/blog') }}">Blogs</a>
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>

                </div>
            </div>
        </div>
    </div>
@endsection