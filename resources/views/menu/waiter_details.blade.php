@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                <center>{{$waiter->name}}</center>
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

            <form action="{{Route('updateWaiter', ['id'=>$waiter->id])}}" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{$waiter->name}}"/>
                </div>

                <div class="form-group">
                    <label for="name">Username</label>
                    <input class="form-control" type="text" id="username" name="username"
                           value="{{$waiter->username}}"/>
                </div>

                <div class="form-group">
                    <label for="name">Pin</label>
                    <input class="form-control" type="text" id="pin" name="pin"
                           value="{{$waiter->password}}"/>
                </div>

                <div>
                    <label for="category">Zone</label>
                    <select class="pull-right" name="zone">
                        @foreach($zones as $zone)
                            <option  value="{{$zone->zone}}"
                                     @if($zone->zone == $waiter->zoneID)
                                     selected
                                    @endif
                            >Zone {{$zone->zone}}</option>
                        @endforeach
                    </select>

                </div>
                <br>


                <button type="submit" class="btn btn-primary">Save</button>
                {{ csrf_field() }}
            </form>
            <br><br>
            <ul class="list-group">
                <li class="list-group-item">Waiter average response time: <span class="badge">{{$totalTime}} minutes</span></li>
                <li class="list-group-item">Tasks completed today: <span class="badge">{{$todayTasksNo}}</span></li>
                <li class="list-group-item">Total tasks: <span class="badge">{{$totalTasks}}</span></li>
            </ul>
        </div>
    </div>

@endsection
