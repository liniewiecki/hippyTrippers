@extends('layouts.app')


@section('content')

    <main class="container-fluid">
        <div class="container-fluid">

            <div class="jumbotron">
                <h1>List of Categories</h1>
            </div>

            @foreach($categories as $category)

                @if($category->blog->count() > 0)
                    <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                @endif
            @endforeach
        </div>
    </main>


    <hr>



@endsection
