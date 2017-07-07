@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h2>Categories</h2>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <a href="{{Route('getAddCategory')}}" type="button" class="btn btn-default pull-left">Add
                            product</a>

                    </div>
                </div>

                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-info">
                        <th>Image</th>
                        <th>Name</th>
                        <th>Image URL</th>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr class="btn-default">
                            <td><img src="{{$category->imageUrl}}" style="width:100px;height:60px;"></td>
                            <td>{{$category->name}}</td>
                            <td style=" max-width: 200px;max-height: 150px;overflow: hidden;">{{$category->imageUrl}}</td>


                            <td>
                                <a href="{{Route('category.details', [$category->id])}}">
                                    <button class="btn btn-xs btn-primary">
                                        <span class="glyphicon glyphicon-info-sign">Detalii</span></button>
                                </a>
                                <button onclick="getConfirmation('{{Route('getCategoryDelete', $category->id)}}');"
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
