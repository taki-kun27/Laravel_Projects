@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
 <div class="col-md-10">
 <div class="card">
 <div class="card-header">
 <div class="float-start">
 Product Information
 </div>
 <div class="float-end">
 <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
 </div>
 </div>
 <div class="card-body">
   <div class="row">
     <!-- Left Column: Product Details -->
     <div class="col-md-6">
       <div class="mb-4">
         <label class="form-label"><strong>Code:</strong></label>
         <p class="form-control-static">{{ $product->code }}</p>
       </div>

       <div class="mb-4">
         <label class="form-label"><strong>Name:</strong></label>
         <p class="form-control-static">{{ $product->name }}</p>
       </div>

       <div class="mb-4">
         <label class="form-label"><strong>Quantity:</strong></label>
         <p class="form-control-static">{{ $product->quantity }}</p>
       </div>

       <div class="mb-4">
         <label class="form-label"><strong>Price:</strong></label>
         <p class="form-control-static">${{ number_format($product->price, 2) }}</p>
       </div>

       <div class="mb-4">
         <label class="form-label"><strong>Description:</strong></label>
         <p class="form-control-static">{{ $product->description }}</p>
       </div>
     </div>

     <!-- Right Column: Product Image -->
     <div class="col-md-6">
       <div class="card">
         <div class="card-header">
           <h5 class="card-title mb-0">Product Image</h5>
         </div>
         <div class="card-body text-center">
           @if($product->image)
             <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid rounded shadow" style="max-height: 400px; width: auto;">
           @else
             <p class="text-muted">No image available</p>
           @endif
         </div>
       </div>
     </div>
   </div>
 </div>
 </div>
 </div> 
</div>
@endsection
