@extends('adminDashboard.master')
@section('content')
<div class="row">
     <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <p class="card-description"></p>
                   <form class="forms-sample" id="productForm" enctype="multipart/form-data" method="POST" action="{{ route('store.product') }}">
                        @csrf

                        {{-- Product Name --}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('productName') is-invalid @enderror" name="productName" value="{{ old('productName') }}" placeholder="Enter Name">
                                @error('productName')
                                    <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Product Code --}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Code</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('productCode') is-invalid @enderror" name="productCode" value="{{ old('productCode') }}" placeholder="Enter Code">
                                @error('productCode')
                                    <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                      {{-- Product Price --}}
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Price</label>
                          <div class="col-sm-6">
                              <input type="number" class="form-control @error('productPrice') is-invalid @enderror" name="productPrice" value="{{ old('productPrice') }}" placeholder="Enter Price">
                              @error('productPrice')
                                  <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      {{-- Quantity --}}
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Quantity</label>
                          <div class="col-sm-6">
                              <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="Enter Quantity">
                              @error('quantity')
                                  <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      {{-- Description --}}
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Description</label>
                          <div class="col-sm-6">
                              <input type="text" class="form-control @error('productDescription') is-invalid @enderror" name="productDescription" value="{{ old('productDescription') }}" placeholder="Enter Description">
                              @error('productDescription')
                                  <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      {{-- Image --}}
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Image</label>
                          <div class="col-sm-6">
                              <input type="file" class="form-control @error('productImage') is-invalid @enderror" name="productImage" accept="image/*">
                              <small class="form-text text-muted">Upload JPG, JPEG, PNG files max 5MB</small>
                              @error('productImage')
                                  <div class="invalid-feedback d-block text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      {{-- Image Preview (Optional UI only) --}}
                      <div class="form-group row">
                          <div class="image-preview-wrapper" id="imagePreviewWrapper">
                              <div class="col-sm-9 image-preview text-center" id="imagePreview">
                                  <span>Uploaded Image Preview</span>
                              </div>
                              <button type="button" class="remove-image" id="removeImage">&times;</button>
                          </div>
                      </div>

                        {{-- Submit Buttons --}}
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-light">Cancel</button>
                            </div>
                        </div>
                  </form>

                  </div>
                </div>
              </div>
</div>

@endsection