@extends('layouts.app')

@section('content')
<div class="page-content-wrapper-inner">
  <div class="content-viewport">
    <div class="row">
      <div class="col-12 py-5">
        <h4>Dashboard</h4>

        <p class="text-gray" style="text-transform:capitalize;">Welcome aboard, 
<?php $user_data = Auth::user(); if(isset($user_data->name)){
  echo $user_data->name; } ?></p>
      </div>
    </div>
    <div class="row">
      
      
    </div>
  </div>
</div>
@endsection
