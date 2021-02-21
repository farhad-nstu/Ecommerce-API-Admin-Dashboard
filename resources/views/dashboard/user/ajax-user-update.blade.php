  
     <!-- content @s --> 
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Personal Information</h4>
                                                <div class="nk-block-des">
                                                    <p>Basic info</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Basics</h6>
                                            </div>
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Name</span>
                                                    <span class="data-value">{{$user->name}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Display Name</span>
                                                    <span class="data-value">{{$user->name}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div>
                                            <!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Email</span>
                                                    <span class="data-value">{{$user->email}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><em class="icon ni ni-forward-ios"></em></span> </div>
                                            </div>
                                            <!-- data-item -->

                                            {{-- <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Phone Number</span>
                                                    <span class="data-value text-soft">Not add yet</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Date of Birth</span>
                                                    <span class="data-value">29 Feb, 1986</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                                <div class="data-col">
                                                    <span class="data-label">Address</span>
                                                    <span class="data-value">2337 Kildeer Drive,<br>Kentucky, Canada</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item --> --}}
                                        </div>
                                        <!-- data-list -->
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Preferences</h6>
                                            </div>
                                            <div class="data-item">
                                                <span class="data-label">@lang('messages.change_language')</span>
                                                <select class="form-select changeLang">
                                                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>@lang('messages.english')</option>
                       
                                                   <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>@lang('messages.bangla')</option>
                                               </select>
                                            </div><!-- data-item -->
                                            {{-- <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Date Format</span>
                                                    <span class="data-value">M d, YYYY</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change</a></div>
                                            </div> --}}
                                            <!-- data-item -->
                                            {{-- <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Timezone</span>
                                                    <span class="data-value">Bangladesh (GMT +6)</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-language" class="link link-primary">Change</a></div>
                                            </div><!-- data-item --> --}}
                                        </div>
                                        <!-- data-list -->
                                    </div><!-- .nk-block -->
                                </div>
                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                    <div class="card-inner-group" data-simplebar>
                                        <div class="card-inner">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                <span>{{$user->name}}</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{$user->name}}</span>
                                                    <span class="sub-text">{{$user->name}}</span>
                                                </div>  
                                            </div><!-- .user-card -->
                                        </div> 
                                        <div class="card-inner p-0">
                                            <ul class="link-list-menu">
                                                {{-- <li><a class="active" href="html/user-profile-regular.html"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                <li><a href="html/user-profile-notification.html"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li>
                                                <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                                                <li><a href="html/user-profile-setting.html"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li> --}}

                                                <li><a href="#"><em class="icon ni ni-shield-star-fill"></em><span>Password Change</span></a></li>
{{-- 
                                                <li><a href="#"><em class="icon ni ni-grid-add-fill-c"></em><span>Connected with Social</span></a></li> --}}
                                            </ul>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-inner-group -->
                                </div><!-- card-aside -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div> 
    <!-- content @e -->
@include('dashboard.user.modal.modal')
 
   

 
