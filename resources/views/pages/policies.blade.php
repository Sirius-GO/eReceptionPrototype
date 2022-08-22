@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.policies') }}</h2></div>

                <div class="panel-body">
					<ul class="list-group" style="font-size: 20px;">
						<li class="list-group-item" style="color: #333;"> Privacy Policy <a href="/privacy" class="btn btn-primary btn-sm pull-right" style="min-width: 100px;"> View </a></li>
						<li class="list-group-item" style="color: #333;"> Terms and Conditions <a href="/terms" class="btn btn-primary btn-sm pull-right" style="min-width: 100px;"> View </a></li>
					</ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
