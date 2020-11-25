@extends('layouts.hub')

@section('content')
    <div class="container">
        <div class="row">
            <div class="logo">
                @if(count($company ?? '') > 0)
                    @foreach($company ?? '' as $comp)
                        <?php $cpy = $comp->company_name; ?>
                        @if($comp->company_logo == '')
                            <img src="https://ereceptionhub.co.uk/storage/images/default_logo.png" style="max-width: 25vw; max-height: 25vh;">
                        @else 
                            <img src="https://ereceptionhub.co.uk/storage{{ $comp->company_logo }}" style="max-width: 25vw; max-height: 25vh;">
                        @endif
                    @endforeach
                @endif
            </div>
                <center><h1 class="welcome">{{ __('messages.welcome') }}<br>
                    <span style="font-size: 3vw;">{{ $cpy }}</span></h1>
                </center>
                <br><br>

        </div>
        <div class="row">
            <div id="signin_out1">
                @if(app()->isLocale('en'))
                <center>
                    <a href="/sign_in_options" alt="sign in choices" title="sign in optins">
                        <img src="https://ereceptionhub.co.uk/storage/images/in.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                        &nbsp;&nbsp;&nbsp;
                    <a href="/scan" alt="Scan In" title="Scan In">
                        <img src="https://ereceptionhub.co.uk/storage/images/scan_in.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#sname"> 
                        <img src="https://ereceptionhub.co.uk/storage/images/out.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="/scanout" alt="Scan Out" title="Scan In">
                        <img src="https://ereceptionhub.co.uk/storage/images/scan_out.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    <br>
                </center>
                @else
                <center>
                    <a href="/sign_in_options" alt="sign in choices" title="sign in optins">
                        <img src="https://ereceptionhub.co.uk/storage/images/in_w.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="/scan" alt="Scan In" title="Scan In">
                        <img src="https://ereceptionhub.co.uk/storage/images/scan_in_w.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#sname"> 
                        <img src="https://ereceptionhub.co.uk/storage/images/out_w.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="/scanout" alt="Scan Out" title="Scan Out">
                        <img src="https://ereceptionhub.co.uk/storage/images/scan_out_w.png" style="max-height: 14vh; max-width: 35vw;">
                    </a>
                    <br> 
                </center>
                @endif
            </div>
        </div>
		
		
		<div class="row">
                @if(count($layout ?? '') > 0)
                    @foreach($layout ?? '' as $l)
						@if($l->hub_msg_ctrl === 1)
                       		<div style="padding: 20px; width: 70%; font-size: 17px; border-radius: 20px; font-weight: 550; background-color: rgba(0,0,0,0.4); margin: auto;">
								<span style="white-space: pre-wrap;">{{$l->hub_msg}}</span>
					   		</div>
						@endif
                    @endforeach
                @endif
		</div>
		
		
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="sname">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-success" style="color: #333;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Search By Name</h4>
            </div>
            <div class="modal-body">
                <br><b style="color: #333;">Search by Name</b><br><br>
                <form action="{{ route('ereception.nameout') }}" method="post">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label  style="color: #333;">Name - (Hint! Only part of a first or last name required)</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success" style="min-width:250px;">
                        <i class="fa fa-search fa-lg"></i> Search Name
                    </button>
                </form>                
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->  
@endsection
