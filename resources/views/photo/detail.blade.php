@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Photo Detail...</b>
                  <a href="{{ url('/photos') }}" class="pull-right">Back to all photos</a>
                </div>

                <div class="panel-body">
                
                    
                      <h2>{{ $photo->title }}</h2 >
                      <h3>{{ $photo->description }}</h3>
                      <h5>ID: {{ $photo->id }}</h5>
                      <h5>Owner: {{ $photo->owner_id }}</h5>
                      <h5>Photo File Ref: {{ $photo->photo_file_id }}</h5>
                      
                  </div>
                 
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
