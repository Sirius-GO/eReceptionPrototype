@extends('layouts.hub')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.signing_in') }}</h2></div>

                <div class="panel-body">

                    <p>...please wait!</p>

                    <?php 
                        if(isset($_GET['id'])){
                            $scan_id = $_GET['id'];
                        }
                    ?>

                    <form action="{{ route('ereception.scan_in') }}" method="post" name="myForm">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="rfid" value="{{ $scan_id ?? 'Not Found'}}" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Submit Form Automatically -->
@if(!empty($scan_id))
    <script>
        document.myForm.submit();
    </script>
@else 
 <p>Scan Code Not Found</p>
@endif

@endsection
