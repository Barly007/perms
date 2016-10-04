@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Show all photos...</b>
                  <a href="{{ url('/photos/create') }}" class="pull-right">Create</a>
                </div>

                <div class="panel-body">
                
                
                {{ Session::get('message') }}
                    @foreach ($photos as $photo)
                    <HR>
                    <div class="row">
                    <div class="col-md-10">
                      <h3>{{ $photo->title }}</h3 >
                      <p>{{ $photo->description }}</p>
                    </div>
                    <div class="col-md-2">
                      <p class="pull-right"><a href="/photos/{{$photo->id}}/edit">edit</a> | <a href="/photos/{{$photo->id}}">view</a></p>
                    </div>
                    </div>  
                    @endforeach
                
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
