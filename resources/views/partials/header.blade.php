<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <title>{{config('app.name', 'Makazi App') }} | @yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
    <link rel="shortcut icon" href="{{ asset('favicon_0.ico') }}" >
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('temp/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/formwizard.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('temp/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('temp/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('temp/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div clas="row">
                    <div class="col-1">  
                        <a class="navbar-brand" href="{{ url('/home') }}">Makazi App</a>  
                    </div>  
                </div>
            </div>