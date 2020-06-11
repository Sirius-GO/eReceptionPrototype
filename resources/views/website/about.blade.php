@extends('layouts.web')

@section('content')
<br><br>
<div class="jumbotron" style="padding: 0px;">
    <img style="width: 100%;" src="../../ereceptionhub/storage/app/public/images/about_banner.jpg">
</div>
<br>
<center>
<h1>About Us</h1>
</ceneter>
<br>


<script>
    $(document).ready(function () {
        $(".nav-item").removeClass("active");
        $('#about').addClass('active');
    });
</script>
@endsection
