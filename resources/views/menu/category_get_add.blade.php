@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                <center>Add Category</center>
            </h1>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>
                            {{$error}}
                        </p>
                    @endforeach
                </div>
            @endif

            <form action="{{Route('addCategory')}}" method="post">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input class="form-control" type="text" id="name" name="name" />
                </div>
                <div class="form-group">
                    <label for="name">Image Url</label>
                    <input class="form-control" type="text" id="imageUrl" name="imageUrl" />
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection
