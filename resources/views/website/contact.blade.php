@extends('layouts.web')

@section('content')
<div class="jumbotron jumbo_cont" style="padding: 0px;">
  <!--  <img style="width: 100%;" src="../../storage/images/contact_banner.jpg"> -->
<center>
<br><br><br><br><br>
<h1 style="font-size: 60px; font-weight: 900;-webkit-text-stroke-width: 2px; -webkit-text-stroke-color: black;">Contact Us</h1>
</ceneter>

</div>
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
