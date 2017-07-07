@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h2>Waiters</h2>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <a href="{{Route('getAddWaiter')}}" type="button" class="btn btn-default pull-left">Add waiter</a>

                    </div>
                </div>

                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-info">
                        <th>Zone</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>PIN</th>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($waiters as $waiter)
                        <tr class="btn-default">
                            <td>{{$waiter->zoneID}}</td>
                            <td>{{$waiter->name}}</td>
                            <TD>{{$waiter->username}}</TD>
                            <TD>{{$waiter->password}}</TD>



                            <td>
                                <a href="{{Route('waiter.details', [$waiter->id])}}">
                                    <button class="btn btn-xs btn-primary">
                                        <span class="glyphicon glyphicon-info-sign">Details</span></button>
                                </a>
                                <button onclick="getConfirmation('{{Route('getWaiterDelete', $waiter->id)}}');"
                                        class="btn btn-xs btn-warning">
                                    <span class="glyphicon glyphicon-trash">Sterge</span></button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
