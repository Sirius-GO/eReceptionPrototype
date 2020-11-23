@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.checkout_cancel') }}</h2></div>
                    <div class="panel-body">
                        <center>
                            <h3>Need help checking out?<br><br>Click here for help</h3>
                            <br>
                            <button class="btn btn-default btn-lg"> Help <i class="fa fa-info fa-lg"></i></button>
                            <br><br>
                            <h3>Alternatively, click here to go back to your Account Page</h3><br>
                            <a href="account" class="btn btn-primary"> <i class="fa fa-arrow-left fa-lg"></i> Back to Account Page </a>
                            <br><br>
                        </center>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection