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
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body"> 
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Create User</h5> 
                        </div>
                    </div><!-- .nk-block-head -->

                    {{--===== Register Start ====== --}}

                <form method="POST" action="{{route('user-save')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Role</label>
                            <div class="form-control-wrap">
                                <select class="form-select @error('role') is-invalid @enderror" name="role">
                                    <option>Select</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                    <option value="Subscriber">Subscriber</option>
                                </select>
                            </div> 
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>

                        

                        <div class="form-group">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" required autocomplete="name" autofocus placeholder="Enter your name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required autocomplete="email" id="email" placeholder="Enter your email address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Enter your Password">
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">Confirm Password</label>
                            <div class="form-control-wrap"> 
                                <input type="password" class="form-control form-control-lg" id="password" name="password_confirmation" required autocomplete="new-password" placeholder="Re-Enter your Password">
                            </div> 
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Save User</button>
                        </div>
                    </form>
                    <!-- form -->

                    {{-- Register End --}} 
                      
                </div><!-- .nk-block -->
                 
            </div><!-- nk-split-content -->
           
        </div><!-- nk-split -->
    </div>
    <!-- wrap @e -->
</div>
<!-- content @e -->
@endsection