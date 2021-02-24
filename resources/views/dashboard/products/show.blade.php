@extends('dashboard.master.app')
@section('title')
Dashboard  
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

<div class="nk-content ">
  <div class="container-fluid">
    <div class="nk-content-inner">
      <div class="nk-content-body">
        <div class="nk-block">
          <div class="card card-bordered card-stretch">
            <div class="card-inner-group">
              <div class="card-inner p-0">
                <div id="imageDiv" class="row pl-2 pt-2">
                  @php
                  $images = json_decode($product->image)
                  @endphp
                  @for($i = 0; $i < count($images); $i++)
                  <img onclick="delete_confirm(`{{ $product->id }}`, `{{ $images[$i] }}`)" width="150px" height="150px" class="px-3" src="{{ asset($images[$i]) }}">
                  @endfor
                </div>
                <div class="row pl-2 pt-2">                  
                  <div class="col-md-6">

                    <div class="row">
                      <div class="col-sm-4">
                        <label class="font-weight-bold">Title</label>
                      </div>
                      <div class="col-sm-8">
                        <span>{{ $product->name }}</span>
                      </div>   
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <label class="font-weight-bold">Category</label>
                      </div>
                      <div class="col-sm-8">
                        @foreach($categories as $category)
                        <span>{{ ($product->category_id == $category->id)?$category->title:'' }}</span>
                        @endforeach
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <label class="font-weight-bold">Brand</label>
                      </div>
                      <div class="col-sm-8">
                        @foreach($brands as $brand)
                        <span>{{ ($product->brand_id == $brand->id)?$brand->title:'' }}</span>
                        @endforeach
                      </div>
                    </div>

                    @if(!empty($product->size))
                    <div class="row">
                      <div class="col-sm-4">
                        <label class="font-weight-bold">Size</label>
                      </div>
                      <div class="col-sm-8">
                        @php
                          $sizes = json_decode($product->size);
                        @endphp
                        @for($i = 0; $i < count($sizes); $i++)
                        <span>{{ $sizes[$i] }}</span>
                        @endfor
                      </div>
                    </div> 
                    @endif                               
                    
                  </div>
                  <div class="col-md-6">

                    <div class="row">
                      <div class="col-sm-4">
                        <label class="font-weight-bold">Price</label>
                      </div>
                      <div class="col-sm-8">
                        <span>{{ $product->price }}</span>
                      </div>   
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <label class="font-weight-bold">Discount Price</label>
                      </div>
                      <div class="col-sm-8">
                        <span>{{ $product->discount_price }}</span>
                      </div>   
                    </div>

                    <div class="row">
                      <div class="col-sm-4">
                        <label class="font-weight-bold">Sub Category</label>
                      </div>
                      <div class="col-sm-8">
                        @foreach($subcategories as $subcategory)
                        <span>{{ ($product->subcategory_id == $subcategory->id)?$subcategory->title:'' }}</span>
                        @endforeach
                      </div>
                    </div> 

                    @if(!empty($product->color))
                    <div class="row">
                      <div class="col-sm-4">
                        <label class="font-weight-bold">Color</label>
                      </div>
                      <div class="col-sm-8">
                        @php
                          $colors = json_decode($product->color);
                        @endphp
                        @for($i = 0; $i < count($colors); $i++)
                        <span>{{ $colors[$i] }}</span>
                        @endfor
                      </div>
                    </div> 
                    @endif   
                    
                  </div>
                  

                </div>  
                <div class="pl-2 pt-2">
                  <p class="h6">About this product</p>
                  <p>{!! $product->details !!}</p>
                </div>              
              </div>
            </div>
          </div>
        </div>
      </div>                 
    </div>
  </div>
</div>

<script type="text/javascript">
  function delete_confirm(id, image) {
    var result = confirm("Want to delete?");
    if(result == true){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "post",
        url : '{{url("admin/product/image-delete")}}',
        data: {
          productId: id,
          image: image
        },
        success:function(data) {
          console.log(data);
          $('#imageDiv').empty().html(data);
        }
      });
    } else {

      return false;
    }
  }
</script>
@endsection