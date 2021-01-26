@extends("layouts.master")

@section('title')
    Chat Page
@endsection

@section('headh1')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h4> @if(session()->has('user')) Hello, {{session('user')}}@endif </h4>
        </div>
        <div class="col-6 left">
            <a class="btn btn-primary" href="http://localhost:8000/logout">Logout</a>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div class="card-body">
        <div class="row">
            <h3>Receiver's name</h3>
        </div>
        <div class="row">
            <div class="col-6 receiver" >
                <label for="usermsg">{{'hi'}}{{" "}}</label>
            </div>
            <div class="col-6 sender">
                <?php
                    use Illuminate\Support\Facades\DB;
                    $users = DB::table('messages')->where('user_id', session('user_id'))->pluck('message');
                    foreach ($users as $usermsg) {
                ?>
                <label for="usermsg">{{$usermsg}}</label>
                <?php echo "<br>"; } ?>
            </div>
        </div>
    </div>

    <form class="form-inline" action="/MessageController/messup" method="post">
        <div class="container fixed-bottom p-4">
            &nbsp;
                <div class="form-group">
                        @csrf
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{session('user_id')}}">
                        <input type="text" class="form-control w-75" id="message" name="message" placeholder="Enter a Message here">
                        <button type="submit" class="btn btn-primary w-25" >Send</button>
                </div>
        </div>
    </form>
</div>
@endsection
