@extends('layouts.hub')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto; height: 400px; overflow-y: scroll;">
                <div class="panel-header"><h2>{{ __('messages.docs') }} <i class="fa fa-arrows-v pull-right"></i> </h2></div>

                <div class="panel-body">
					<?php $x = 0; $id = 171; ?>
					@if(count($docs)>0)
						@foreach($docs as $d)
							<?php 
								$sig_req = $x + $d->sig_req;
								$x = $sig_req;
							?>
							<h5>Document No: {{$d->doc_no}}</h5>
							<h3>{{$d->title}}</h3>
							<span style="white-space: pre-wrap; line-height: 2;"><?php echo str_replace("", "&bull;", $d->content); ?></span>
							<br><br>
						@endforeach
					{{$sig_req}}
					@endif
                </div>
            </div>
			<br>
			
			@if ($x === 0)
			<div class="text-center"><a href="/tas" class="btn btn-primary"> I Confirm I Have Read and Understand the Above <i class="fa fa-check"></i> </a></div>
			@else 
			<div class="text-center"><a href="/esign/{{$id}}" class="btn btn-primary"> Signature Required - Next <i class="fa fa-arrow-right"></i> </a></div>
			@endif
        </div>
    </div>
</div>

@endsection