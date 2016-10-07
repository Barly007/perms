@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
  <ul>
    @foreach ($errors->all() as $error )
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Create a photo entry...</b></div>

                <div class="panel-body">
                    <h2>Add new photo</h2>
                    <form class="" action="/photos/{{$photo->id}}" method="post">
                    {{ method_field('PUT') }}
                      <input type="text" name="title" value="{{$photo->title}}" placeholder="this is title"><br>
                      {{ ($errors->has('title')) ? $errors->first('title') : '' }} <br>

                      <textarea name="description" rows="8" cols="40" placeholder="this is description">{{$photo->description}}</textarea><br>
                      {{ ($errors->has('description')) ? $errors->first('description') : '' }} <br>

                      <input type="text" name="photo_file_id" value="{{$photo->photo_file_id}}" placeholder="photo ref"><br>
                      {{ ($errors->has('photo_file_id')) ? $errors->first('photo_file_id') : '' }} <br>

                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      <input type="submit" name="name" value="Update" class="btn btn-danger">
                      <a href="{{ url('/photos') }}" class="btn btn-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
