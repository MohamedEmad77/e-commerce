@extends('layouts.app')

@section('content')

      
@include('includes.errors')
      <div class="panel panel-default">
            <div class="panel-heading">
                  edit {{$product->name}}
            </div>

            <div class="panel-body">
                  <form action="{{route('products.update', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" class="form-control" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="name">Price</label>
                              <input type="text" name="price" class="form-control" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                              <label for="Description">Description</label>
                              <textarea name="description" id="content" cols="5" rows="5" class="form-control">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                              <div class="text-center">
                                    <button class="btn btn-success" type="submit">
                                          Edit product
                                    </button>
                              </div>
                        </div>
                  </form>
            </div>
      </div>

@stop