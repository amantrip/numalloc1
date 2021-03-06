@extends('layouts.default')

@section('title')
    <title>Num-Alloc Add Admin</title>
@stop

@section('styling')
    <link rel="stylesheet" href="css/compiled/new-user.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/home-page.css" />
@stop

@section('header')

    <ul class="nav navbar-nav pull-right hidden-xs">
        <li class="settings hidden-xs hidden-sm">
            <a href="/logout" role="button">
                <i class="icon-share-alt"></i>
            </a>
        </li>
    </ul>
@stop


@section('sidebar')
    <ul id="dashboard-menu">
        <li class="">
            <a href="/">
                <i class="icon-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a class="dropdown-toggle" href="#">
                <i class="icon-user"></i>
                <span>OCN Manager</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="active submenu">
                <li><a href="/manager" class="">Number List</a></li>
                <li><a href="/number/create">Add New Number</a></li>
                <li><a href="/number/port">Port A Number</a></li>
                <li><a href="/manager/manage" class="active">Manage Admin</a></li>
                <li><a href="/manager/reset">Reset Password</a></li>
                <li><a href="/manager/edit" class="">Edit Profile</a></li>
            </ul>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="new-user">
        <div class="row header">
            <div class="col-md-12">
                <h3>Add System/Number Admin User</h3>
            </div>
        </div>
        <div class="row form-wrapper">
            <!-- left column -->
            <div class="col-md-6 with-sidebar">
                @if(Session::has('error_message'))
                    <div class="alert alert-danger">
                        <i class="icon-remove-sign"></i>
                        {{Session::get('error_message')}}
                    </div>
                @endif
                {{ Form:: open(['action' => 'OCNManagerController@addAdmin', 'class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form:: label('email', 'Email', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('email', 'email',  null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group FIELD-BOX">
                        {{ Form:: label('type', 'Type', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            <label class="radio">{{ Form:: radio('type', 'privileged', false) }}OCN Manager</label>

                            <label class="radio">{{ Form:: radio('type', 'number', true) }}OCN Number Admin</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                            {{ Form:: submit('Submit', ['class' => 'btn btn-flat success']) }}
                            <a class="btn btn-flat" href="/manager/manage">Cancel</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop