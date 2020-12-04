<script src="https://ereceptionhub.co.uk/js/sign.js"></script>						
<div class="text-center">
	<h3>Please sign below, click the checkbox, then click the confirm button.</h3>
	<div id="canvas">
		Canvas is not supported.
	</div>

	<script>
		signatureCapture();
	</script>
	
		<img id="saveSignature" alt="Image" style="display: none;">

		<label>I confirm that I have read and fully understand all documents:</label>&nbsp;&nbsp;&nbsp;
		<input type="checkbox"  style="transform: scale(2);" name="confirm" id="confirm" value="I Understand"><label for="confirm">
		<input type="hidden" name="id" id="id" value="{{$r->id}}">
		&nbsp;&nbsp;&nbsp;
		<button class="btn btn-success" onclick="signatureSend()">
			Confirm
		</button>	
		&nbsp;&nbsp;&nbsp;
		<button class="btn btn-warning" onclick="signatureClear()">
			Clear Signature
		</button>
</div>
<form action="{{route('esign.store')}}" method="POST" enctype="multipart/form-data" id="myForm">
	{{ csrf_field() }}
	<input type="hidden" name="image1" id="aaa">
	<input type="hidden" name="confirm" id="bbb">
	<input type="hidden" name="id" id="ccc">
	<script>
		function fillForm(a, b, c){
			var aa = a;
			var bb = b;
			var cc = c;

			document.getElementById("aaa").value = aa;
			document.getElementById("bbb").value = bb;
			document.getElementById("ccc").value = cc;
			document.getElementById("myForm").submit();
		}
	</script>
</form>
