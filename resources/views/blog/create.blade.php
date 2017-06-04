@extends('layouts.app')


@section('content')

    <main class="container-fluid">
        <div class="container-fluid">

            <div class="jumbotron">
                <h1>Create blog posts</h1>
            </div>

            <div class="col-sm-10 col-sm-offset-1">
                {!! Form::open(['method' => 'POST']) !!}

                    <div class="form-group">
                        {!! Form::label("title" , "Title:") !!}
                        {!! Form::text("title" , null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label("body" , "Body:") !!}
                        {!! Form::text("body" , null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit("Create a blog" , ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </main>


    <hr>



@endsection
