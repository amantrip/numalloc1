@extends('layouts.default')

@section('title')
    <title>Num-ALLOC Subscriber Change Password</title>
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
                <i class="icon-globe"></i>
                <span>Subscriber</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="active submenu">
                <li><a href="/subscriber" class="">Subscriber Information</a></li>
                <li><a href="" class="active">Change Password</a></li>
            </ul>
        </li>
    </ul>
@stop

@section('content')
    <div id="pad-wrapper" class="new-user">
        <div class="row header">
            <div class="col-md-12">
                <h3>Change Password</h3>
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
                {{ Form:: open(['action' => 'SubscriberController@subscriberChangePassword', 'class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form:: label('newpassword', 'New Password', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('password', 'newpassword', null, ['class' => 'form-control', 'placeholder' => 'Password']) }}
                            {{ Form::hidden('number', $number->number) }}
                            {{Form::hidden('id', $number->id)}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('repassword', 'Retype Password', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('password', 'repassword', null, ['class' => 'form-control', 'placeholder' => 'Retype Password']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <!--<button type="submit" class="btn btn-default">Sign in</button>-->
                            {{ Form:: submit('Reset', ['class' => 'btn btn-flat success']) }}
                            <a class="btn btn-flat" href="/subscriber">Cancel</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop