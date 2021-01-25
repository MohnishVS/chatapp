@extends("layouts.master")

@section('title')
    Chat Page
@endsection

@section('headh1')
<div class="container fixed-center">
   <h4> @if(session()->has('user')) Hello, {{session('user')}}@endif </h4>
</div>
@endsection

@section('content')
<?php
      $recmsg= "you!!";
      $usermsg= "hey you!!";
      $time= "3:15pm"; ?>
<div class="container">
    <div class="card-body">
        <div class="row">
            <h3>Receiver's name</h3>
        </div>
        <div class="row">
            <div class="col-6 receiver" >
                <label for="usermsg">{{$recmsg}}{{" "}}{{$time}}</label>
            </div>
            <div class="col-6 sender">
                <label for="usermsg">{{$usermsg}}{{" "}}{{$time}}</label>
            </div>
        </div>
    </div>

    <form class="form-inline" action="MessageController" method="post">
        <div class="container fixed-bottom p-4">
            &nbsp;
                <div class="form-group">
                        @csrf
                        <input type="text" class="form-control w-75" id="message" name="message" placeholder="Enter a Message here">
                        <button type="submit" class="btn btn-primary w-25">Send</button>
                </div>
        </div>
    </form>
</div>
@endsection
