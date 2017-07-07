@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <h1>
                Incomes Dashboard
            </h1>
            <br>
            <div>
                <h3>Number of orders today: {{$noOfTodayOrders}}</h3>
                <h3>Total incommes Today: {{$todayIncomes}} LEI</h3>
            </div>
            <br><br>
            <div id="dashboard-container" style="min-width: 600px; height: 400px; margin: 0 auto;"
                 data-results="{{$results}}">
            </div>
            <br><br>

        </div>
    </div>
@endsection
