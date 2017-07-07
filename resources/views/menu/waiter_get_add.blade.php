@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                <center>Add Waiter</center>
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

            <form action="{{Route('addWaiter')}}" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name"/>
                </div>

                <div class="form-group">
                    <label for="name">Username</label>
                    <input class="form-control" type="text" id="username" name="username"
                         />
                </div>

                <div class="form-group">
                    <label for="name">Pin</label>
                    <input class="form-control" type="text" id="pin" name="pin"
                           />
                </div>

                <div>
                    <label for="category">Zone</label>
                    <select class="pull-right" name="zone">
                        @foreach($zones as $zone)
                            <option  value="{{$zone->zone}}">Zone {{$zone->zone}} </option>
                        @endforeach
                    </select>

                </div>
                <br>


                <button type="submit" class="btn btn-primary">Save</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection
