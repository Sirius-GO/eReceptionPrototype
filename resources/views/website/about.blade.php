@extends('layouts.web')

@section('content')
<br><br>
<div class="jumbotron jumbo_img" style="padding: 0px;">
    <!--<img style="width: 100%;" src="../../storage/images/about_banner.jpg">-->


<center>
<br><br><br><br><br>
<h1 style="font-size: 60px; font-weight: 900;-webkit-text-stroke-width: 2px; -webkit-text-stroke-color: black;">About Us</h1>
</ceneter>

</div>

<br>


<script>
    $(document).ready(function () {
        $(".nav-item").removeClass("active");
        $('#about').addClass('active');
    });
</script>
@endsection
