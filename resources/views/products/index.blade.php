@extends('layouts.app')

@section('content')

      <div class="panel panel-default">
            <div class="panel-heading">
                  Products
            </div>
            <div class="panel-body">
                  <table class="table table-hover">
                        <thead>
                              
                              <th>
                                    Name
                              </th>

                              <th>
                                    Price
                              </th>

                              <th>
                                    Edit
                              </th>
                              <th>
                                    Delete
                              </th>
                        </thead>

                        <tbody>
                              @if($products->count() > 0)
                                    @foreach($products as $product)
                                          <tr>
                                                 
                                                 <td>
                                                      {{$product->name}}
                                                </td>

                                                <td>
                                                      {{$product->price}}
                                                </td>

                                                <td>
                                                      <a href="{{ route('products.edit', ['id' => $product->id ]) }}" class="btn btn-info btn-xs">
                                                            Edit
                                                      </a>
                                                </td>

                                                <td>
                                                      <form action="{{route('products.destroy', ['id' => $product->id])}}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                      <button class="btn btn-danger btn-xs">
                                                            Delete
                                                      </button>
                                                      </form>
                                                     
                                                </td>
                                          </tr>
                                    @endforeach

                                   
                              @else
                                     <tr>
                                          <th colspan="5" class="text-center">No products yet.</th>
                                    </tr>
                              @endif
                        </tbody>
                  </table>
            </div>
            <div class="text-center">
                  {{ $products->links() }}
            </div>
      </div>

@stop