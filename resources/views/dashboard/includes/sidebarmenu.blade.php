<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
  <div class="nk-sidebar-element nk-sidebar-head">
    <div class="nk-sidebar-brand">
      <a href="{{route('home')}}" class="logo-link nk-sidebar-logo">
        <img class="logo-light logo-img" src="{{$setting->logo}}" alt="logo"> 
      </a>
    </div>
    <div class="nk-menu-trigger mr-n2">
      <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
    </div>

  </div><!-- .nk-sidebar-element -->
  <div class="nk-sidebar-element">
    <div class="nk-sidebar-content">
      <div class="nk-sidebar-menu" data-simplebar>
        <div class="form-group">
          {{-- <h6 class="nk-menu-text">@lang('messages.change_language')</h6>
          <div class="form-control-wrap">
            <select class="form-select changeLang">
             <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>@lang('messages.english')</option>

             <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>@lang('messages.bangla')</option>
           </select>
         </div> --}}
       </div>
       <ul class="nk-menu"> 

         {{-- ======USER AREA====== --}}

         @if (Auth::user()->role == 'User')
         <li class="nk-menu-item">
          <a href="html/index.html" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
            <span class="nk-menu-text">@lang('messages.user_can')</span>
          </a>
        </li><!-- .nk-menu-item --> 
        @endif

        {{-- ======Subscriber AREA====== --}}

        @if (Auth::user()->role == 'Subscriber')
        <li class="nk-menu-item">
          <a href="html/index.html" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
            <span class="nk-menu-text">@lang('messages.subscriber_can')</span>
          </a>
        </li>
        <!-- .nk-menu-item -->

        <li class="nk-menu-item">
          <a href="html/index.html" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
            <span class="nk-menu-text">@lang('messages.subscriber_can')</span>
          </a>
        </li><!-- .nk-menu-item --> 
        @endif

        {{-- ======ADMIN AREA====== --}}

        @if (Auth::user()->role == 'Admin') 


        <li class="nk-menu-item">

          <a href="{{route('showSettings')}}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>

            <span class="nk-menu-text">{{ __('messages.settings') }}</span>
          </a>
        </li>

        <!-- .nk-menu-item --> 
        {{-- <div class="col-md-4">
          <select class="form-control changeLang">
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>

            <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>

          </select>       
        </div>   --}}


        @endif

        {{-- ======SUPERADMIN AREA====== --}}

        @if (Auth::user()->role == 'superadmin') 


        <li class="nk-menu-item">

          <a href="{{route('showSettings')}}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>

            <span class="nk-menu-text">{{ __('messages.settings') }}</span>
          </a>
        </li>

        <!-- .nk-menu-item --> 
        {{-- <div class="col-md-4">
          <select class="form-control changeLang">
            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>

            <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>

          </select>       
        </div>   --}}

        <li class="nk-menu-item">
          <a href="{{ route('user-registration') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span> 
            <span class="nk-menu-text">@lang('messages.registration')</span>
          </a>
        </li>
        <!-- .nk-menu-item -->

        <li class="nk-menu-item">
          <a href="{{ route('user-list') }}" class="nk-menu-link">
            <span class="nk-menu-icon"><em class="icon ni ni-bitcoin-cash"></em></span> 
            <span class="nk-menu-text">@lang('messages.user list')</span>
          </a>
        </li>

        <li class="nk-menu-item has-sub">
          <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-square"></em></span>
            <span class="nk-menu-text">Product Manage</span>
          </a>

          <ul class="nk-menu-sub">
            <li class="nk-menu-item">
              <a href="{{ route('product.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                <span class="nk-menu-text">List</span>
              </a>
            </li>
            <li class="nk-menu-item">
              <a href="{{ route('product.create') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                <span class="nk-menu-text">Add</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nk-menu-item has-sub">
          <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-square"></em></span>
            <span class="nk-menu-text">Category Manage</span>
          </a>

          <ul class="nk-menu-sub">
            <li class="nk-menu-item">
              <a href="{{ route('category.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                <span class="nk-menu-text">Category List</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nk-menu-item has-sub">
          <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-square"></em></span>
            <span class="nk-menu-text">SubCategory Manage</span>
          </a>

          <ul class="nk-menu-sub">
            <li class="nk-menu-item">
              <a href="{{ route('subcategory.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                <span class="nk-menu-text">List</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nk-menu-item has-sub">
          <a href="javascript:void(0)" class="nk-menu-link nk-menu-toggle">
            <span class="nk-menu-icon"><em class="icon ni ni-square"></em></span>
            <span class="nk-menu-text">Brand Manage</span>
          </a>

          <ul class="nk-menu-sub">
            <li class="nk-menu-item">
              <a href="{{ route('brand.index') }}" class="nk-menu-link">
                <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                <span class="nk-menu-text">List</span>
              </a>
            </li>
          </ul>
        </li>

        @endif
      </ul>
      <!-- .nk-menu -->
    </div><!-- .nk-sidebar-menu -->
  </div><!-- .nk-sidebar-content -->
</div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->