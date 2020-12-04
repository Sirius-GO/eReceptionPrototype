@extends('layouts.hub')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.sign') }}</h2></div>

                <div class="panel-body">
					@if(count($registration) > 0)
						@foreach($registration as $r)
							@include('inc.sign')
						@endforeach
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
