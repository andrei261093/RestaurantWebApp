@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h2>Zones</h2>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <a type="button" class="btn btn-default pull-left" id="add-zone-btn">Add zone</a>
                    </div>
                </div>

                <br>
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        Zones
                    </a>
                @foreach ($zones as $zone)
                        <a class="list-group-item clearfix">
                            Zone {{$zone->zone}}
                    <span class="pull-right">
                        <span class="btn btn-xs btn-danger" onclick="getConfirmation('{{Route('getZoneDelete', $zone->id)}}');">
                            <span class="" aria-hidden="true">Delete</span>
                        </span>
                    </span>
                        </a>

                @endforeach
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-zone-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Zone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Zone no:</label>
                        <input class="form-control" type="number" id="modal-add-zone-zoneNo" name="name"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="modal-add-zone-btn" class="btn btn-primary">Add zone</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getConfirmation(url) {
            if (window.confirm('Sigur vrei sa stergi?')) {
                window.location = url
            }
            else {
            }
        }
    </script>
@endsection
