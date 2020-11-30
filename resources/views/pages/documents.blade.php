@extends('layouts.app2')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.documents') }}</h2></div>

				
                <div class="panel-body">
					<br><br>
					
					
					<div class="col-sm-12 col-md-12 text-center">
						<form action="{{route('create.doc')}}" method="post" style="padding: 20px; background-color: rgba(255,255,255,0.4); border-radius: 20px;">
							{{ csrf_field() }}
							<div class="form-group">
 		   			             <label>Document Title</label>
      				             <input type="text" class="form-control" name="title" placeholder="Document Title (Max 150 Chars)" size="150"><br>	
 		   			             <label>Document Content</label>
								 <textarea class="form-control" style="white-space: pre-wrap;"  name="content" rows="10" placeholder="Document Content (Max 10000 Chars)" size="150"></textarea><br>
									<div class="col-sm=12 col-md-6">
										 <label>Signature Required</label>
										 <input type="checkbox" name="sig_req" value="1">
									</div>
									<div class="col-sm=12 col-md-6">
										 <label>Slot</label>
										 <select name="doc_no" style="color: #333;">
											 <option value=""> Please Choose a Slot</option>
											 <option value="1"> - 1 - </option>
											 <option value="2"> - 2 - </option>
											 <option value="3"> - 3 - </option>
										</select> 
									</div>
								    <br><br>									
								<button type="submit" class="btn btn-primary"> Add a New  Hub Document</button>
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
											SLOT {{$d->doc_no}}: <b>{{$d->title}}</b>
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
											   onclick="slotedit(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}', '{{$d->sig_req}}', '{{$d->id}}')"> 
												<i class="fa fa-edit"></i> Edit Document 
											</a>
										</div>
									</div>
								@endif
								
								@if($d->doc_no === 2)
									<div class="row"> 
										<div class="col-sm-12 col-md-6">
											SLOT {{$d->doc_no}}: <b>{{$d->title}}</b>
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
											   onclick="slotedit(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}', '{{$d->sig_req}}', '{{$d->id}}')"> 
												<i class="fa fa-edit"></i> Edit Document 
											</a>
										</div>
									</div>
								@endif
								
								@if($d->doc_no === 3)
									<div class="row">
										<div class="col-sm-12 col-md-6">
											SLOT {{$d->doc_no}}: <b>{{$d->title}}</b>
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
											   onclick="slotedit(`{{$d->title}}`, `<?php echo str_replace("", "&bull;", $d->content); ?>`, '{{$d->doc_no}}', '{{$d->sig_req}}', '{{$d->id}}')"> 
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
					
					
	
				</div>		
            </div>
        </div>
    </div>
</div>



  <div class="modal fade" tabindex="-1" role="dialog" id="slotv">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Document Preview - Slot <span id="sn"></span></h4>
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
			<h4 class="modal-title">Edit Document - Slot <span id="ccc"></span></h4>
        </div>
        <div class="modal-body" style="color: #333;">
			<form action="{{route('edit.doc')}}" method="post" style="padding: 20px; background-color: rgba(255,255,255,0.4); border-radius: 20px;">
				{{ csrf_field() }}
				<div class="form-group">
					
					<label>Document Title</label>
					<input type="text" class="form-control" name="title" size="150" id="aa"><br>	
					
					<label>Document Content</label>
					<textarea class="form-control" style="white-space: pre-wrap;"  name="content" rows="10" size="150" id="bb"></textarea><br>
					
					<div class="col-sm=12 col-md-6">
						<label>Slot</label>
						<input type="text" name="doc_no" id="cc">
					</div>					
					<div class="col-sm=12 col-md-6">
						<label>Signature Required</label>
						<input type="checkbox" name="sig_req" id="dd" value="1">
					</div>

					
					<input type="hidden" name="id" id="ee">	
					
					<br><br>									
					<button type="submit" class="btn btn-primary"> Update Hub Document</button>
				</div>
			</form>
            <br> 
			<script>
				function slotedit(a, b, c, d, e){
					var title = a;
					var content = b;
					var sl = c;
					var slt = c;
					var sig = d;
					var did = e;
					
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
				}
			</script>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal --> 
@endsection
