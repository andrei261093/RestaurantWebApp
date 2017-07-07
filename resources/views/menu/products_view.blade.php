@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h2>Products</h2>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <a href="{{Route('getAddProduct')}}" type="button" class="btn btn-default pull-left">Add product</a>

                    </div>
                </div>

                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr class="bg-info">
                        <th>Image</th>
                        <th>Name</th>
                        <th>Short Description</th>
                        <th>Price</th>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr class="btn-default">
                            <td><img src="{{$product->imageUrl}}" style="width:100px;height:60px;"></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->shortDescription}}</td>
                            <td>{{$product->price}}</td>

                            <td>
                                <a href="{{Route('product.details', [$product->id])}}">
                                    <button class="btn btn-xs btn-primary">
                                        <span class="glyphicon glyphicon-info-sign">Edit</span></button>
                                </a>
                                <button onclick="getConfirmation('{{Route('getProductDelete', $product->id)}}');"
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
