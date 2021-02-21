@extends('dashboard.master.app')
@section('title')
    Change Password 
@endsection

@section('content')
@if (Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong class="text-danger">Message: {{  Session::get('error')  }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>      
@endif



<div class="row">
     
    <div class="col-lg-8">
    <form method="POST" action="{{route('passwordUpdate')}}"> 
            @csrf  
            <!-- .form-group --> 
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Old Password</label> 
                    </div>
                    <div class="form-control-wrap">
                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg @error('oldpass') is-invalid @enderror" id="password" name="oldpass" required autocomplete="current-password" placeholder="Old Password">
        
                        @error('oldpass')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            <!-- .form-group --> 
        
            <!-- .form-group --> 
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">New Password</label> 
                    </div>
                    <div class="form-control-wrap">
                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="New Password">
        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            <!-- .form-group -->  

            <!-- .form-group --> 
                <div class="form-group">
                    <div class="form-label-group">
                        <label class="form-label" for="password">Confirm Password</label> 
                    </div>
                    <div class="form-control-wrap">
                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                        </a>
                        <input type="password" class="form-control form-control-lg" id="password-confirm" name="password_confirmation" required placeholder="Confirm Password">  
                    </div>
                </div>
            <!-- .form-group -->  
            
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Change Password</button>
            </div>
        </form>
    </div>
</div>
@endsection