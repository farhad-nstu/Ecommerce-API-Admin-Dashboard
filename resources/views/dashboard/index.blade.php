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
    <h1 class="text-success"><strong class="text-warning">Hi! {{Auth::user()->name}} </strong> Your Role is {{Auth::user()->role}} </h1>
@endsection