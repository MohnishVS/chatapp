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

<div class="container text-wrap">
    <div class="card-body">
        <div class="row">
            <h3>{{session('rec_name')}}</h3>
        </div>
        <div class="row position-relative overflow-auto">
            <div class="col-6 receiver" >
                <?php
                    use Illuminate\Support\Facades\DB;
                    $users = DB::table('messages')->where('user_id', session('rec_id'))->pluck('message');
                    foreach ($users as $recmsg) {
                ?>
                <label for="usermsg">{{$recmsg}}</label>
                <?php echo "<br>"; } ?>
            </div>
            <div class="col-6 sender">
                    <?php
                        // use Illuminate\Support\Facades\DB;
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
                        <input type="hidden" class="form-control" id="rec_id" name="rec_id" value="{{session('rec_id')}}">
                        <input type="text" class="form-control w-75" id="message" name="message" required maxlength=25 placeholder="Enter a Message here">
                        <button type="submit" class="btn btn-primary w-25" >Send</button>
                </div>
        </div>
    </form>
</div>
@endsection
