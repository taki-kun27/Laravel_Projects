@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="card">
      <div class="card-header">
        <div class="float-start">
          Edit Product
        </div>
        <div class="float-end">
          <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
      </div>

      <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")
          <div class="row">
            <!-- Left Column: Product Details -->
            <div class="col-md-6">
              <div class="mb-4">
                <label for="code" class="form-label">Code:</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $product->code }}">
                @error('code')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-4">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}">
                @error('name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-4">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ $product->quantity }}">
                @error('quantity')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-4">
                <label for="price" class="form-label">Price:</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product->price }}">
                @error('price')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-4">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                @error('description')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <!-- Right Column: Product Image -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Product Image</h5>
                </div>
                <div class="card-body">
                  <div class="mb-4">
                    <label for="image" class="form-label">Update Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    @error('image')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="text-center">
                    @if($product->image)
                      <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image" class="img-fluid rounded shadow mb-3" style="max-height: 300px; width: auto;">
                      <p class="text-muted">Current Image</p>
                    @else
                      <p class="text-muted">No image available</p>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
