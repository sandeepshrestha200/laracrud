@extends('layout.master')

@section("content")

    <div class="row d-flex justify-content-center">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{route('products.index')}}" class="btn btn-dark">Back</a>
            </div>
        </div>
            
            
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-3">
                    <div class="card-header bg-dark text-white">
                        <h3>
                            Edit Product
                        </h3>
                    </div>

                    <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf

                        <div class="card-body">

                            <div class="mb-3">
                                <label for="name" class="form-label h5">Name</label>
                                <input type="text" value="{{ old('name', $product->name) }}" id="name" name="name" class="@error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="sku" class="form-label h5">SKU</label>
                                <input type="text" value="{{ old('sku',$product->sku) }}" id="sku" name="sku" class="@error('sku') is-invalid @enderror form-control form-control-lg" placeholder="SKU">

                                @error('sku')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror

                            </div>
                            
                            <div class="mb-3">
                                <label for="price" class="form-label h5">Price</label>
                                <input type="text" value="{{ old('price',$product->price) }}" id="price" name="price" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="Price">

                                @error('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label h5">Description</label>
                                <textarea type="text" id="description" name="description" rows="5" class="form-control form-control-lg" placeholder="Description"> {{ old('description',$product->description) }} </textarea>
                            </div>

                                <div class="mb-3">
                                <label for="image" class="form-label h5">Image</label>
                                <input type="file" id="image" name="image" class="form-control form-control-lg" placeholder="Image">
                                  @if ($product->image != "")
                                    <img src="{{ asset('uploads/products/'.$product->image) }}" class="w-25 py-4" alt="{{$product->name}}">
                                @endif
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection