@extends('dashboard.master.app')
@section('title')
    Question List
@endsection
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title text-warning">Products List</h4>
            <div class="float-right mb-3">
              <a href="{{ route('product.create') }}" class=" btn btn-icon btn-primary"><em
              class="icon ni ni-plus"></em>
              </a>
            </div>
        </div>
    </div>
    <div class="card card-preview">
        <div class="card-inner">
            <table class="datatable-init table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Title</th> 
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                 <tbody> 
                     @forelse ($products as $product)
                        <tr> 
                          <td>{{$loop->index + 1}}</td> 
                          <td>
                            <?php 
                              $images = json_decode($product->image);
                            ?>
                              <div class="nk-tb-col">
                                <a href="html/user-details-regular.html">
                                  <div class="user-card">
                                    <div class="user-info">
                                      @if (!empty($images))
                                      <span class="tb-lead"><img src="{{ $images[0] }}" width="100px;"><span
                                          class="dot dot-success d-md-none ml-1"></span></span>
                                      @else
                                      <span class="tb-lead"><img src="" width="100px;"><span
                                          class="dot dot-success d-md-none ml-1"></span></span>
                                      @endif
                                    </div>

                                  </div>
                                </a>
                              </div>
                          </td>
                            
                            <td>
                                <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                            </td> 
                            <td>
                              @foreach($categories as $category)
                                {{ ($category->id == $product->category_id)?$category->title:'' }}
                              @endforeach
                            </td> 
                            <td>{{ $product->price }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('product.edit', $product->id) }}" title="Edit">
                                    <span><em class="icon ni ni-pen-fill"></em></span>
                                  </a>
    
                                  <a class="btn btn-sm btn-info" href="{{ route('product.show', $product->id) }}" title="Details">
                                    <span><em class="icon ni ni-eye-fill"></em></span>
                                  </a>
    
                                  <a href="#" class="btn btn-sm btn-danger"
                                  onclick="return myConfirm();">
                                  <span><em class="icon ni ni-trash"></em></span>
                                  </a>
    
                                  <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy', $product->id) }}"
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
    </div><!-- .card-preview -->
</div> <!-- nk-block -->
<input type="hidden" id="success" value="{{Session::get('success')}}" />
@endsection

@section('scripts')

<script type="text/javascript">
    function myConfirm() {
      var result = confirm("Want to delete?");
      if (result==true) {
        @if(!empty($product->id))
        event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();
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