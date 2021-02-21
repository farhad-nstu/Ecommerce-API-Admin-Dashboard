@extends('dashboard.master.app')
@section('title')
    Application Settings
@endsection

@section('content')
{{-- @php
    printf($settings);
@endphp --}}
<div class="row g-gs">
    <div class="col-lg-8">
        <div class="card card-bordered h-100">
            <div class="card-inner">
                <form method="POST" action="{{ route('settings-update') }}" enctype="multipart/form-data">
                    @csrf 
                <div class="table-responsive p-1">
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <h6>Logo</h6>
                    <tr><td colspan="2"><img src="./{{$settings->logo}}" alt="" id="profile_photo" style="max-width: 100px;"></td></tr>    
                    <tr><td>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="avatar" onchange="showImage(this,'profile_photo')">
                                <label for="inputGroupFile02" class="custom-file-label" id="fileLabel">Choose Logo</label>
                            </div>
                        </div>
                    </td></tr> 
                    <tr><td></td></tr>
                    </table>
                </div>  
                    <div class="form-group">
                        <label class="form-label" for="application_title">Application Title</label>
                        <div class="form-control-wrap">
                        <input type="text" class="form-control" name="application_title" value="{{$settings->application_title}}" id="application_title">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="form-label" for="application_credit">Application Credit</label>
                        <div class="form-control-wrap">
                            <input type="text" value="{{$settings->application_credit}}" class="form-control" id="application_credit" name="application_credit">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="developer_url">Developer URL</label>
                        <div class="form-control-wrap">
                            <input type="text" value="{{$settings->developer_url}}" name="developer_url" class="form-control" id="developer_url">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="form-label" for="copyright_text">Copyright Text</label>
                        <div class="form-control-wrap">
                            <textarea id="copyright_text"  name="copyright_text" class="form-control" cols="12" rows="2">{{$settings->copyright_text}}</textarea>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="form-label" for="maintenance_words">Application Maintenance Words</label>
                        <div class="form-control-wrap">
                            <textarea id="maintenance_words" value="{{$settings->maintenance_words}}"  name="maintenance_words" class="form-control" cols="16" rows="2">{{$settings->maintenance_words}}</textarea>
                        </div>
                    </div> 
                    
                <input type="hidden" value="{{$settings->id}}" name="setting_id" >
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>  
</div>
@endsection