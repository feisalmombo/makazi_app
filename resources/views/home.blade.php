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
                      <h3>Regions</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-check-circle fa-5x"></i></div>
                        </div>
                        <div class="huge">{{ number_format($regionsCount[0]->regionsCount) }}</div>  
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
                      <h3>Districts</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-file fa-5x"></i></div>
                        </div>
                        <div class="huge">{{ number_format($districtsCount[0]->districtsCount) }}</div>
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
                      <h3>Wards</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-times fa-5x"></i></div>
                        </div>
                        <div class="huge">{{ number_format($wardsCount[0]->wardsCount) }}</div>  
                    </div>
                </div>
           </div>
        </a>
    </div> 
</div>  

@if(Auth::user()->hasRole('customer'))
<div class="col-md-12">
    <h1 class="page-header">Customer Dashboard</h1>
</div>

<div class="row">
    <div class="col-lg-4">
        <a href="#" style="text-decoration: none;">
           <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                      <h3>Regions</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-check-circle fa-5x"></i></div>
                        </div>
                        <div class="huge">{{ number_format($regionsCount[0]->regionsCount) }}</div>  
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
                      <h3>Districts</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-file fa-5x"></i></div>
                        </div>
                        <div class="huge">{{ number_format($districtsCount[0]->districtsCount) }}</div>
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
                      <h3>Wards</h3>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-9 text-left">
                            <div><i class="fa fa-times fa-5x"></i></div>
                        </div>
                        <div class="huge">{{ number_format($wardsCount[0]->wardsCount) }}</div>  
                    </div>
                </div>
           </div>
        </a>
    </div> 
</div> 
@endif
@endsection
