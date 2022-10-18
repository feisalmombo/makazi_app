@extends('layouts.app')

@section('title', 'Home')

@section('content')

@if(Auth::user()->hasRole('developer'))
<div class="col-md-12">
    <h1 class="page-header">Dashboard</h1>
</div>
@endif

<div class="row">
    <div class="col-lg-4">
        <a href="#" style="text-decoration: none;">
           <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      <h3>All Regions</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-check-circle fa-5x"></i></div>
                        </div>
                        <div class="huge">12</div>
                    </div>
                </div>
           </div>
        </a>
    </div> 


    <div class="col-lg-4">
        <a href="#" style="text-decoration: none;">
           <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      <h3>All Districts</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-file fa-5x"></i></div>
                        </div>
                        <div class="huge">12</div>
                    </div>
                </div>
           </div>
        </a>
    </div> 


    <div class="col-lg-4">
        <a href="#" style="text-decoration: none;">
           <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      <h3>All Wards</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-times fa-5x"></i></div>
                        </div>
                        <div class="huge">12</div>
                    </div>
                </div>
           </div>
        </a>
    </div> 
</div>  

@if(Auth::user()->hasRole('customer'))
<div class="col-md-12">
    <h1 class="page-header">Makazi App</h1>
</div>
@endif
@endsection
