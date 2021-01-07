@extends('layouts.app2')
<?php
	use App\Account;
	$accounts_check = Account::where('company_id', auth()->user()->company_id)->get();

		if(count($accounts_check) > 0){
			foreach($accounts_check as $a){
				//Get Vars
				$active = $a->status;
				$sub_type = $a->type;
			}
		}
?>
@section('content')
@include('inc.status_check')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.documents') }}</h2></div>

				
                <div class="panel-body">
					@if($sub_type === 'Silver' || $sub_type ==='Gold')
					<br><br>
					
					
					<div class="col-sm-12 col-md-12 text-center">
						<a href="#" 
						   class="btn btn-warning" 
						   data-toggle="modal" 			   
						   data-target="#instr" > 
							<i class="fa fa-info fa-lg"></i> Document Formatting Instructions 
						</a>
						<br><br>
						<form action="{{route('create.doc')}}" method="post" style="padding: 20px; background-color: rgba(255,255,255,0.4); border-radius: 20px;">
							{{ csrf_field() }}
							<div class="form-group">
 		   			             <label>Document Title</label>
      				             <input type="text" class="form-control" name="title" placeholder="Document Title (Max 150 Chars)" maxlength="150"><br>	
 		   			             <label>Document Content</label>
								 <textarea class="form-control" style="white-space: pre-wrap;"  name="content" rows="10" placeholder="Document Content (Max 4500 Chars)" maxlength="4500"></textarea><br>
									<div class="col-sm=12 col-md-4">
										 <label>Signature Required</label>
										 <input type="checkbox" name="sig_req" value="1">
									</div>
									<div class="col-sm-12 col-md-4">
										 <label>Docs</label>
										 <select name="doc_no" style="color: #333;" required>
											 <option value=""> Document Order</option>
											 <option value="1"> - 1 - </option>
											 <option value="2"> - 2 - </option>
											 <option value="3"> - 3 - </option>
										</select> 
									</div>
									<div class="col-sm-12 col-md-4">
										 <label>Display Options</label>
										 <select name="on_off" style="color: #333;" required>
											 <option value="">Display Options</option>
											 <option value="1"> Show </option>
											 <option value="0"> Don't Show </option>
										</select> 
									</div>
								    <br><br>									
								<button type="submit" class="btn btn-primary"> Add / Overwrite a Hub Document</button>
							</div>
						</form>
					</div>

					<div class="col-sm-12 col-md-12">
						<br><br>
						<div style="width: 100%; padding:15px; background-color: #fff; border: solid 1px #888; color: #333;">
							@if(count($docs)>0)
							@foreach($docs as $d)
								@if($d->doc_no === 1)
									<div class="row"> 
										<div class="col-sm-12 col-md-6">
											DOC {{$d->doc_no}}: <b>{{$d->title}}</b>
										</div>
										<div class="col-sm-12 col-md-3">
											<a href="#" 
											   data-toggle="modal" 
											   data-target="#slotv" 
											   class="btn btn-primary btn-sm pull-right" 
											   style="margin: 0px 0px 0px 10px;"
											   onclick="slotview(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}')"> 
												<i class="fa fa-search"></i> View Document 
											</a>
										</div>
										<div class="col-sm-12 col-md-3">									
											<a href="#" 
											   data-toggle="modal" 
											   data-target="#slote" 
											   class="btn btn-primary btn-sm pull-right" 
											   style="margin: 0px 0px 0px 10px;" 
											   onclick="slotedit(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}', '{{$d->sig_req}}', '{{$d->id}}', '{{$d->on_off}}')"> 
												<i class="fa fa-edit"></i> Edit Document 
											</a>
										</div>
									</div>
								@endif
								
								@if($d->doc_no === 2)
									<div class="row"> 
										<div class="col-sm-12 col-md-6">
											DOC {{$d->doc_no}}: <b>{{$d->title}}</b>
										</div>
										<div class="col-sm-12 col-md-3">
											<a href="#" 
											   data-toggle="modal" 
											   data-target="#slotv" 
											   class="btn btn-primary btn-sm pull-right" 
											   style="margin: 0px 0px 0px 10px;"
											   onclick="slotview(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}')"> 
												<i class="fa fa-search"></i> View Document 
											</a>
										</div>
										<div class="col-sm-12 col-md-3">									
											<a href="#" 
											   data-toggle="modal" 
											   data-target="#slote" 
											   class="btn btn-primary btn-sm pull-right" 
											   style="margin: 0px 0px 0px 10px;" 
											   onclick="slotedit(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}', '{{$d->sig_req}}', '{{$d->id}}', '{{$d->on_off}}')"> 
												<i class="fa fa-edit"></i> Edit Document 
											</a>
										</div>
									</div>
								@endif
								
								@if($d->doc_no === 3)
									<div class="row">
										<div class="col-sm-12 col-md-6">
											DOC {{$d->doc_no}}: <b>{{$d->title}}</b>
										</div>
										<div class="col-sm-12 col-md-3">
											<a href="#" 
											   data-toggle="modal" 
											   data-target="#slotv" 
											   class="btn btn-primary btn-sm pull-right" 
											   style="margin: 0px 0px 0px 10px;"
											   onclick="slotview(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}')"> 
												<i class="fa fa-search"></i> View Document 
											</a>
										</div>
										<div class="col-sm-12 col-md-3">									
											<a href="#" 
											   data-toggle="modal" 
											   data-target="#slote" 
											   class="btn btn-primary btn-sm pull-right" 
											   style="margin: 0px 0px 0px 10px;" 
											   onclick="slotedit(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}', '{{$d->sig_req}}', '{{$d->id}}', '{{$d->on_off}}')"> 
												<i class="fa fa-edit"></i> Edit Document 
											</a>
										</div>	
									</div>
								@endif
							
							<hr>
							@endforeach
							@endif
						</div>
					</div>
					
					
					@else
					<p>Please Upgrade your account to a Silver or Gold subscription to get access to this facility. <br>Thank you.</p>
				    @endif
				</div>		
            </div>
        </div>
    </div>
</div>


  <div class="modal fade" tabindex="-1" role="dialog" id="instr">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Document Formatting Instructions </h4>
        </div>
        <div class="modal-body" style="color: #333;">
			<p>eReception Hub supports a list of html tags that you can use to format your <b>documents content</b>. <br>
			<h6>(This does not apply to the tilte, only the content of your documents.)</h6>	
			See some examples below:<br><br>
			</p>
			<b>bold text:</b> <xmp> <b>...</b> </xmp>
			<i>italic text:</i> <xmp> <i>...</i> </xmp>
			<u>underline text:</u> <xmp> <u>...</u> </xmp>
			<s>strike textstrike text:</s> <xmp> <s>…</s> </xmp>
			<p>paragraph:<p> <xmp> <p>…</p> </xmp>
			<h3>Headings - h1(largest) to h6(smallest) - (This text is h3)</h3> <xmp> <h1>...</h1> </xmp>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 





  <div class="modal fade" tabindex="-1" role="dialog" id="slotv">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Document Preview - Doc <span id="sn"></span></h4>
        </div>
        <div class="modal-body" style="color: #333;">
			<div><u><h4><span id="aaa"></span></h4></u></div>
			<div style="white-space: pre-wrap; line-height: 2;"><span id="bbb"></span></div>
            <br> 
			<script>
				function slotview(t, tt, ttt){
					var tl = t;
					var ttl = tt;
					var tttl = ttt;
					document.getElementById('aaa').innerHTML = tl;
					document.getElementById('bbb').innerHTML = ttl;
					document.getElementById('sn').innerHTML = tttl;
				}
			</script>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 

  <div class="modal fade" tabindex="-1" role="dialog" id="slote">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Edit Document - Doc <span id="ccc"></span></h4>
        </div>
        <div class="modal-body" style="color: #333;">
			<form action="{{route('edit.doc')}}" method="post" style="padding: 20px; background-color: rgba(255,255,255,0.4); border-radius: 20px;">
				{{ csrf_field() }}
				<div class="form-group">
					
					<label>Document Title</label>
					<input type="text" class="form-control" name="title" maxlength="150" id="aa"><br>	
					
					<label>Document Content</label>
					<textarea class="form-control" style="white-space: pre-wrap;"  name="content" rows="10" maxlength="4500" id="bb"></textarea><br>					
					<div class="col-sm-12 col-md-6">
						<label>Signature Required</label>
						<input type="checkbox" name="sig_req" id="dd" value="1">
					</div>
					<div class="col-sm-12 col-md-6">
						<label>Display Options</label>
						<select name="on_off" style="color: #333;" required id="onoroff">
							<script>
								if document.getElementById("onoroff").value === '1'){
							</script>
							<option value="1" selected> Show </option>
							<script>
								} else {
							</script>
							<option value="0" selected> Don't Show </option>
							<script> } </script>
						</select> 
					</div>

					<input type="hidden" name="doc_no" id="cc">	
					<input type="hidden" name="id" id="ee">	
					
					<br><br>									
					<button type="submit" class="btn btn-primary"> Update Hub Document</button>
				</div>
			</form>
            <br> 
			<script>
				function slotedit(a, b, c, d, e, f){
					var title = a;
					var content = b;
					var sl = c;
					var slt = c;
					var sig = d;
					var did = e;
					var onf = f;
					
					console.log(sl);
					
					document.getElementById('aa').value = title;
					document.getElementById('bb').value = content;
					document.getElementById('cc').value = sl;
					document.getElementById('ccc').innerHTML = slt;
					if(sig > 0){
						document.getElementById("dd").checked = true;
					} else {
						document.getElementById("dd").checked = false;
					}
					document.getElementById('ee').value = did;	
					document.getElementById('onoroff').value = onf;	
				}
			</script>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
@endsection
