@extends('master')
@section('title','Game Page')
@section('u-title','Game Page')
@section('content')
<style>link.active{background-color: orange;}</style>
<div id="" class="container bg-warning" style="position: relative;z-index:0;">
    <div class="loader"></div>
    <iframe id="game"  src="{{$data->link_name}}" allow="autoplay; fullscreen; microphone" webkitallowfullscreen="true" mozallowfullscreen="true" msallowfullscreen="true" allowfullscreen="true" style="border: 0px; background-color: transparent !importan; width: 100%; height: 700px; min-width: 100%; min-height: 100%;margin-bottom: -6px;z-index:1;"></iframe>
</div>
<div class="container pt-2 pb-2" style="background-color: black;">
    <div class="row">
      <a href="{{route('home')}}" class="col pl-4">
        <img src="{{ asset( 'images/page/pageimg.png') }}" alt="page avatar" width="60%" height="auto">
      </a>
      <div class="col-4">

      </div>
      <div class="col" style="position: relative">
        <button onclick="openFullscreen();" style="background: transparent;border: medium;"><i class="fas fa-compress pb-3" style="color: orange;font-size: xx-large;position: absolute;right: 24px;top: 10px;"></i></button>
      </div>
    </div>
</div>
<div class="container bg-dark pt-3 pb-2">
  <div id="main">
    <div class="container">
      <div class="group-tabs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="nav-item orangehover"><a class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
          <li role="presentation" class="nav-item orangehover"><a class="nav-link nav-item" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Walkthrough</a></li>
          <li role="presentation" class="nav-item orangehover"><a class="nav-link nav-item" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
          <li role="presentation" class="nav-item orangehover"><a class="nav-link nav-item" href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
        </ul>
  
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">{!! $data->note!!}</div>
          <div role="tabpanel" class="tab-pane" id="profile">
              <iframe width="100%"  style="height:-webkit-fill-available" src="{{$data->video_name}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
              </iframe>
          </div>
          <div role="tabpanel" class="tab-pane" id="messages">This is Messages content</div>
          <div role="tabpanel" class="tab-pane" id="settings">This is Settings content</div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection