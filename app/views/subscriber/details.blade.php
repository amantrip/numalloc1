@extends('layouts.default')

@section('title')
    <title>Num Alloc Edit Subscriber Details</title>
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
            <a class="" href="/">
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

            </a>
            <ul class="active submenu">
                <li><a href="/subscriber" class="active">Subscriber Details</a></li>
                <li><a href="/subscriber/change">Change Password</a></li>
            </ul>
        </li>
    </ul>
@stop




@section('content')
    <div id="pad-wrapper" class="new-user">
        <div class="row header">
            <div class="col-md-12">
                <h3>Subscriber Details </h3>
            </div>
        </div>
        <div class="row form-wrapper">
            <!-- left column -->
            <div class="col-md-6 with-sidebar">
                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <i class="icon-ok"></i>
                        {{Session::get('success_message')}}
                    </div>
                @endif
                {{ Form:: open(['action' => 'SubscriberController@subscriberEditDetails', 'class' => 'form-horizontal']) }}

                    <div class="form-group">
                        {{ Form:: label('number', 'Alloted Number', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: label('number', $number->number, ['class' => 'control-label', 'required']) }}
                            {{Form::hidden('id', $number->id)}}
                            {{Form::hidden('number', $number->number)}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('cnam', 'Caller Name', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'cnam', $number->cnam, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('gsui', 'Globally-Unique Subscriber ID', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('text', 'gusi', $number->gusi, ['class' => 'form-control' , 'readonly' => 'readonly', 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form:: label('pin', 'Porting PIN', ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-8">
                            {{ Form:: input('password', 'pin', null, ['class' => 'form-control', 'required']) }}

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            {{ Form:: submit('Update', ['class' => 'btn btn-flat success']) }}
                        </div>
                    </div>
                {{Form:: close()}}
            </div>
        </div>
    </div>
@stop

@section('footer')
<script>
    function showOCN(str)
    {
        if (str.length==0) {
        document.getElementById("assignee").value="";
        return;
        } else {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("assignee").value=xmlhttp.responseText;
            }
        }
            //xmlhttp.open("GET","http://nodea.app:8000/get/ocn/"+str,true);
            xmlhttp.open("GET","{{getenv('ocn')}}"+str,true);
            xmlhttp.send();
        }
    }


    function showLocation(str)
        {
            if (str.length==0) {
            document.getElementById("location").value="";
            return;
            } else {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    var jsonObj = JSON.parse(xmlhttp.responseText);
                    document.getElementById("location").value=jsonObj.results[0].formatted_address;
                }
            }
                xmlhttp.open("GET","http://maps.googleapis.com/maps/api/geocode/json?address="+str+"&sensor=true",true);
                xmlhttp.send();
            }
        }

</script>
@stop