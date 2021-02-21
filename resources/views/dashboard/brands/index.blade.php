@extends('dashboard.master.app')
@section('title')
Question List
@endsection
@section('content')
<div class="nk-block nk-block-lg">
  <div class="row">
    <div class="col-md-4">
      <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-100" style="width: 100%;">
        <div class="absolute-top-right d-lg-none p-3 p-sm-5">
          <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
        </div>
        <div class="nk-block nk-block-middle nk-auth-body" style="margin-top: 0;"> 
          <div class="nk-block-head">
            <div class="nk-block-head-content">
              <h5 class="nk-block-title">Add Brand</h5> 
            </div>
          </div>
          <form method="POST" action="{{route('brand.store')}}">
            @csrf
            <div class="form-group">
              <label class="form-label" for="title">Title<span style="color: red">*</span></label>
              <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" id="title" required autocomplete="title" autofocus placeholder="Enter Category Title">

              @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-primary">Save</button>
            </div>
          </form>                      
        </div>                
      </div>
    </div>
    <div class="col-md-8">
      <div class="card card-preview">
        <div class="card-inner">
          <table class="datatable-init table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Title</th> 
                <th>Action</th> 
              </tr>
            </thead>
            <tbody> 
            @forelse ($brands as $brand)
             <!-- Modal Start -->
            <div class="modal fade zoom" tabindex="-1" role="dialog" id="details{{$brand->id}}">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                  <div class="modal-body modal-body-lg">
                    <div class="tab-content">
                      <div class="tab-pane active" id="personal">
                      </div>
                      <form method="POST" action="{{route('brand.update', $brand->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label class="form-label" for="title">Title<span style="color: red">*</span></label>
                          <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ $brand->title }}" name="title" id="title" required autocomplete="title" autofocus />
                          @error('title')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
            <!-- Modal End -->
            <tr> 
              <td>{{$loop->index + 1}}</td> 
              <td>
                <a href="{{ route('brand.show', $brand->id) }}">{{ $brand->title }}</a>
              </td> 
              <td>
                <a data-toggle="modal" data-target="#details{{$brand->id}}" class="btn btn-sm btn-success" href="{{ route('brand.edit', $brand->id) }}" title="Edit">
                  <span><em class="icon ni ni-pen-fill"></em></span>
                </a>

                <a href="#" class="btn btn-sm btn-danger"
                onclick="return myConfirm();">
                <span><em class="icon ni ni-trash"></em></span>
                </a>

                <form id="delete-form-{{ $brand->id }}" action="{{ route('brand.destroy', $brand->id) }}"
                method="POST" style="display: none;">
                @csrf @method('delete')
                </form>
              </td> 
            </tr> 
            @empty
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<input type="hidden" id="success" value="{{Session::get('success')}}" />
@endsection

@section('scripts')

<script type="text/javascript">
  function myConfirm() {
    var result = confirm("Want to delete?");
    if (result==true) {
      @if(!empty($brand->id))
      event.preventDefault(); document.getElementById('delete-form-{{ $brand->id }}').submit();
      @endif
    } else {
     return false;
   }
 }
</script>

@if (Session::get('success')) 
<script>
  var message = $('#success').val();  
  if(message){
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: message,
      showConfirmButton: false,
      timer: 1500
    });
    e.preventDefault(); 
  }
</script> 

@endif 
@endsection