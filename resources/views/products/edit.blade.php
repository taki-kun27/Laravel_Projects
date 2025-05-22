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
      <div class="card-header d-flex justify-content-between align-items-center">
        <span>Edit Product</span>
        <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
      </div>

      <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="post">
          @csrf
          @method("PUT")

          <div class="row">
            <!-- Left Column: Inputs -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $product->code }}">
                @error('code')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $product->name }}">
                @error('name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ $product->quantity }}">
                @error('quantity')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $product->price }}">
                @error('price')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $product->description }}</textarea>
                @error('description')
                  <span class="text-danger">{{ $message }}</span>
                @enderror 
              </div>

              <div class="mb-3 text-end">
                <input type="submit" class="btn btn-primary" value="Update">
              </div>
            </div>

            <div class="col-md-6 d-flex align-items-center justify-content-center">
              <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image" class="img-fluid rounded shadow">

              <div class="mb-3">
              <label for="image" class="form-label">Upload New Image</label>
                <input type="file" name="image" id="image" class="form-control">
                 @error('image')
               <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
            </div>
            
            

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
