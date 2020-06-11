@extends('layouts.web')

@section('content')
<div class="jumbotron" style="padding: 0px;">
    <img style="width: 100%;" src="../../ereceptionhub/storage/app/public/images/contact_banner.jpg">
</div>
<br>
<center>
<h1>Contact Us</h1>
</ceneter>
<br>
<div style="text-align: left;">
@include('inc.contactform')
</div>
    
<script>
    $(document).ready(function () {
        $(".nav-item").removeClass("active");
        $('#contact').addClass('active');
    });
</script>
@endsection