@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                <center>Table no: {{$table->tableNo}}</center>
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

            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Table no:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{$table->tableNo}}"/>
                </div>

                <div class="form-group">
                    <label for="name">Pin</label>
                    <input class="form-control" type="text" id="password" name="password"
                           value="{{$table->tablePassword}}"/>
                </div>

                <div>
                    <label for="category">Zone</label>
                    <select class="pull-right" name="zone">
                        @foreach($zones as $zone)
                            <option  value="{{$zone->zone}}"
                                     @if($zone->zone == $table->zoneID)
                                     selected
                                    @endif
                            >{{$zone->zone}} </option>
                        @endforeach
                    </select>

                </div>
                <br>


                <button type="submit" class="btn btn-primary">Save</button>
                {{ csrf_field() }}
            </form>
            <br><br>

        </div>
    </div>

@endsection
