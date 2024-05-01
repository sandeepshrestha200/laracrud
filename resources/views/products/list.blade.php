@extends('layout.master')

@section("content")


        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('products.create')}}" class="btn btn-dark">Create</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
                <div class="col-md-10 mt-4">
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div> 
            @endif

            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-3">
                    <div class="card-header bg-dark text-white">
                        <h3>
                            Products
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if ($products->isNotEmpty())
                                @php $serial = 1; @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$serial++}}</td>
                                        <td>
                                            @if ($product->image != "")
                                                <img src="{{ asset('uploads/products/'.$product->image) }}" width="50" alt="{{$product->name}}">
                                            @endif
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->sku}}</td>
                                        <td>Rs. {{$product->price}}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M,Y') }}</td>
                                        <td>
                                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-dark">Edit</a>

                                            <a href="#" onclick="deleteProduct({{ $product->id }});" class="btn btn-danger">Delete</a>

                                            <form id="delete-product-from-{{$product->id}}" action="{{route('products.delete',$product->id) }}" method="post">
                                                @method("DELETE")
                                                @csrf
                                                
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            @endif
                        </table>
                    </div>

                    

                </div>
            </div>
        </div>
    
    
@endsection

<script>
    function deleteProduct(id) {
        if (confirm("Are you sure?")) {
            document.getElementById("delete-product-from-"+id).submit();
        }
    }
</script>