@extends('layouts.app')

@section('content')
<!-- <php dump($survey);
exit();?> -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Survey</div>
                <div class="card-body">
<form method="GET" action="/survey/edit/{{$survey[0]->id}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Title</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $survey[0]->name }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input name="description" type="text" class="form-control" id="exampleInputPassword1" value="{{$survey[0]->description}}" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
