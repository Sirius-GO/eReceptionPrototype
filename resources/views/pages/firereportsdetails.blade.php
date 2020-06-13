@extends('layouts.fire')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <button onclick="printFireReport()" class="btn btn-default btn-sm"><i class="fa fa-print"></i> Print Fire Report </button> &nbsp;&nbsp;
                <a href="/firereports" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                <div class="panel-header"><h2>{{ __('messages.View_F_Report') }}</h2></div>

                <div class="panel-body" id="fire_report">
                    <style>
                        #formatted {
                            /*background-image: URL('http://localhost:8080/ereceptionhub/storage/app/public/images/bg_tile3.png');
                            background-repeat: repeat;*/
                            overflow-x: hidden;
                            font-family: tahoma, sans-serif;
                            font-size: 15px;
                            color: #333;
                            magin-left: 30px;
                            margin-right: 30px;
                        }
                        #firedrill_window_bar{
                            width: 100%; padding: 5px;
                            border: solid 1px #eee;
                            margin-top: 5px;
                            border-radius: 30px;
                            background-color: rgba(255, 255, 255, 0.3);
                            margin-left: 0px;
                        }
                    </style>
                    <script>
                        function printFireReport(){
                            var printContents = document.getElementById('fire_report').innerHTML;
                            w = window.open();
                            w.document.write(printContents);
                            w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');
                            w.document.querySelector("body:last-child").id = "formatted";
                            //w.document.querySelector("row:last-child").id = "firedrill_window_bar";
                            w.document.close(); // necessary for IE >= 10
                            w.focus(); // necessary for IE >= 10
                            return true;
                        }                                      
                    </script>

                    @if(count($firedrill) > 0)
                    @foreach($firedrill as $f)
                    <?php $fdate = substr($f->cdt, 0, 10); ?>
                    <div class="row" id="firedrill_window_bar">
                        <div style="margin-top: 5px;">
                            <span class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <span class="badge">Name:</span>
                                    {{$f->name}}
                            </span>
                            <span class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <span class="badge">Call Status:</span>
                                {{$f->call_status}}
                            </span>
                            <span class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <span class="badge">Report:</span>
                                {{$f->report}}
                            </span>
                            <span class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                <span class="badge">Call Time:</span>
                                <?php echo date('jS F, Y H:i:s', strtotime($f->cdt)); ?>
                            </span>
                        </div>
                    </div>
                    @endforeach
                    <h3>Fire Drill Completed on: <?php echo date('jS F, Y', strtotime($fdate)); ?></h3>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
