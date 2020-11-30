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
						<form action="" method="post" style="padding: 20px; background-color: rgba(255,255,255,0.4); border-radius: 20px;">
							{{ csrf_field() }}
							<div class="form-group">
 		   			             <label>Document Title</label>
      				             <input type="text" class="form-control" name="title" placeholder="Document Title (Max 150 Chars)" size="150"><br>	
 		   			             <label>Document Content</label>
								<textarea class="form-control" name="content" rows="10" placeholder="Document Content (Max 10000 Chars)" size="150"></textarea><br>
								<div class="col-sm=12 col-md-6">
									 <label>Signature Required</label>
									 <input type="checkbox" name="sig_req" value="1">
								</div>
								<div class="col-sm=12 col-md-6">
									 <label>Document Slot Attribution</label>
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
						<ul class="list-group" style="color: #333;">
							<li class="list-group-item"> SLOT 1: </li>
							<li class="list-group-item"> SLOT 2: </li>
							<li class="list-group-item"> SLOT 3: </li>
						</ul>
					</div>
				</div>
						
						
            </div>
        </div>
    </div>
	
</div>
@endsection
