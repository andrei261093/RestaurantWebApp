@extends('layouts.app')

@section('content')]

<div class="container">

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="thumbnail">
                    <img src="http://www.westlondonliving.co.uk/wordpress/wp-content/uploads/2012/02/cochis-2.jpg"
                         alt="...">
                    <div class="caption">
                        <h3>Manage Tables</h3>
                        <p>Add, delete and edit Tables</p>
                        <p><a href="{{Route('getManageTables')}}" class="btn btn-primary" role="button">Manage</a></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="thumbnail">
                    <img src="http://68.media.tumblr.com/ba95e6800333f206964265e131f34806/tumblr_inline_mizzl5scP71qz4rgp.jpg"
                         alt="...">
                    <div class="caption">
                        <h3>Manage zones</h3>
                        <p>Add, delete and edit Zones</p>
                        <p><a href="{{Route('getManageZones')}}" class="btn btn-primary" role="button">Manage</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
