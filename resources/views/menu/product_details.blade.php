@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>
                <center>Edit Product</center>
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

            <form action="{{Route('updateProduct', ['id'=>$product->id])}}" method="post">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{$product->name}}"/>
                </div>

                <div class="form-group">
                    <label for="name">Image Url</label>
                    <input class="form-control" type="text" id="imageUrl" name="imageUrl"
                           value="{{$product->imageUrl}}"/>
                </div>

                <div class="form-group">
                    <label for="name">Short Description</label>
                    <input class="form-control" type="text" id="shortDescription" name="shortDescription"
                           value="{{$product->shortDescription}}"/>
                </div>

                <div class="form-group">
                    <label for="name">Long Description</label>
                    <textarea class="form-control" type="text" id="longDescription"
                              name="longDescription">{{$product->longDescription}}</textarea>
                </div>


                <div class="form-group">
                    <label for="name">Needs Preparation</label>
                    <input class="pull-right" type="checkbox" id="needsPreparation" name="needsPreparation"
                           value="{{$product->needsPreparation}}"
                           @if ($product->needsPreparation)
                           checked
                            @endif/>
                </div>

                <div>
                    <label for="category">Category</label>
                    <select class="pull-right" name="category">
                        @foreach($categories as $category)
                            <option  value="{{$category->id}}"
                            @if($category->id == $product->category)
                            selected
                                    @endif
                            >{{$category->name}} </option>
                        @endforeach
                    </select>

                </div>
                <br>

                <div class="form-group">
                    <label for="name">Price</label>
                    <input class="form-control" type="number" id="price" name="price" value="{{$product->price}}"/>
                </div>

                <div class="form-group">
                    <label for="name">Weight</label>
                    <input class="form-control" type="number" id="weight" name="weight" value="{{$product->weight}}"/>
                </div>


                <button type="submit" class="btn btn-primary">Save</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>

@endsection
