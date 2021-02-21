@extends('dashboard.master.app')
@section('title')
YouthFireIT | Dashboard  
@endsection

@section('content')
@if (Session::get('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong class="text-success">Message: {{  Session::get('message')  }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>      
@endif
<!-- content @s -->
<div class="nk-content "> 
  <div class="nk-split nk-split-page nk-split-md">
    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white" style="width: 100%;">
      <div class="absolute-top-right d-lg-none p-3 p-sm-5">
        <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
      </div>
      <div class="nk-block nk-block-middle nk-auth-body"> 
        <div class="nk-block-head">
          <div class="nk-block-head-content">
            <h5 class="nk-block-title">Add Product</h5> 
          </div>
        </div>

        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label class="form-label" for="name">Category<span style="color: red">*</span></label>
            <select onchange="get_sub_cat(this.value)" class="form-control form-control-lg @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}" name="category_id" id="category_id">
              <option>Select Category</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div id="subCat" class="form-group">
            <label class="form-label" for="name">Sub Category<span style="color: red">*</span></label>
            <select class="form-control form-control-lg @error('subcategory_id') is-invalid @enderror" value="{{ old('subcategory_id') }}" name="subcategory_id" id="subcategory_id">
              <option>Select SubCategory</option>
            </select>
            @error('subcategory_id')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="name">Brand<span style="color: red">*</span></label>
            <select class="form-control form-control-lg @error('brand_id') is-invalid @enderror" value="{{ old('brand_id') }}" name="brand_id" id="brand_id">
              <option>Select Brand</option>
              @foreach($brands as $brand)
              <option value="{{ $brand->id }}">{{ $brand->title }}</option>
              @endforeach
            </select>
            @error('brand_id')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="name">Title<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="name" autofocus placeholder="Enter Question Title">

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="price">Price<span style="color: red">*</span></label>
            <input type="text" class="form-control form-control-lg @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" id="price" placeholder="Enter Price">

            @error('price')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="price">Discount Price</label>
            <input type="text" class="form-control form-control-lg @error('discount_price') is-invalid @enderror" value="{{ old('discount_price') }}" name="discount_price" id="discount_price" placeholder="Enter discount_price">

            @error('discount_price')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="price">Size</label>
            <select class="form-control form-control-lg @error('size') is-invalid @enderror" value="{{ old('size') }}" name="size" id="size" >
              <option>Select Size</option>
              <option value="M">M</option>
              <option value="S">S</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
            </select>
            @error('size')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="color">Color</label>
            <select class="form-control form-control-lg @error('color') is-invalid @enderror" value="{{ old('color') }}" name="color" id="color" >
              <option>Select Color</option>
              <option value="Black">Black</option>
              <option value="Red">Red</option>
              <option value="Blue">Blue</option>
              <option value="Green">Green</option>
            </select>
            @error('color')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="price">Image</label>
            <input type="file" class="form-control form-control-lg @error('image') is-invalid @enderror" value="{{ old('image') }}" name="images[]" multiple>

            @error('image')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label" for="details">Details</label>
            <textarea type="text" class="summernote-basic" id="full-name" name="details"></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Save</button>
          </div>
        </form>
        <!-- form -->

      </div><!-- .nk-block -->

    </div><!-- nk-split-content -->

  </div><!-- nk-split -->
</div>
<!-- wrap @e -->
</div>
<!-- content @e -->
@endsection

@section('scripts')
  <link rel="stylesheet" href="{{ asset('/') }}assets/css/editors/summernote.css?ver=1.9.2">
  <script src="{{ asset('/') }}assets/js/libs/editors/summernote.js?ver=1.9.2"></script>
  <script src="{{ asset('/') }}assets/js/editors.js?ver=1.9.2"></script>
  <script type="text/javascript">
    function get_sub_cat(id) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "post",
        url : '{{url("admin/subCat")}}',
        data: {
          catId: id,
        },
        success:function(data) {
          $('#subCat').empty().html(data);
        }
      });
    }
  </script>
@endsection
