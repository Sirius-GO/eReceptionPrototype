@extends('layouts.app2')

@if(auth()->user()->user_level === 1)
<!-- Rediredct to My Account -- The Dashboard should not be accessible for staff level memebers -->
<?php
header("Location: account");
exit();
?>
@endif

<?php

use App\Location;

?>




@section('content')
@include('inc.status_check')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.dashboard') }}</h2></div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        @if(session('location'))
                        <?php
                            $loc_det = Location::where('id', session('location'))->get();
                            foreach($loc_det as $l){
                                $loc_name = $l->location_name . ' Hub ' . $l->location_code;
                            }
                        ?>
                        <center>
                            <p>Hub Location: {{ $loc_name }}</p><br>
                            <a href="hub" class="btn btn-primary btn_lg" style="font-size: 20px;"> <img src="../../storage/images/erec.ico" height="30px"> Display <img src="../../storage/images/logo_w.png" height="22px"> </a><br><br>
                        </center>
                        @else 
                        <center>
                            <div class="col-md-4 col-md-offset-4">
                                @if(count($location) > 0)
                                <form action="{{ route('ereception.location') }}" method="post">
                                    {{ csrf_field()}}
                                    <div class="form-group">
                                        <label  style="color: #fff;">Please choose a Location from the Dropdown</label>
                                        <!-- Read in from DB -->
                                        <select name="loc" class="form-control">
                                            <option value=""  disabled selected> --- Please Select --- </option>
                                            @foreach($location as $loc)
                                                <option value="{{ $loc->id }}">{{ $loc->location_name }} Hub {{ $loc->location_code }}</option>
                                            @endforeach
                                        </select>                        
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary btn_lg" style="min-width:250px;">
                                        <i class="fa fa-map-marker fa-lg"> </i> Set Hub Location
                                    </button>
                                </form>
                                @else 
                                    <p style="word-break: break-word;">Please Set Locations on the My Account Page</p>
                                @endif
                            </div>
                            <br><br>
                        </center>
                        @endif

                        <!-- To produce QR Codes anywhere ue the following method -->
                        <!--<img src="qr-code?text=Welcome to the eReception Hub Dashboard&size=100" alt="QR Code">-->
                        <div class="col-md-12">
                            <div id="container3" style="width:100%; height:300px; margin-top: 10px; padding: 10px; border-radius: 10px; background-color: rgba(255, 255, 255, 0.4);"></div>
                            </div>
                            <script>
                                var data_in =  <?php echo json_encode($data); ?>;
                                var data_out =  <?php echo json_encode($data2); ?>;
                                var data_scale = <?php echo json_encode($data3); ?>;
                                
                                var s = data_scale.length-1;
    
                                console.log(data_in);
                                console.log(data_out);
                                console.log(data_scale);
    
                                    Highcharts.chart('container3', {
                                                chart: {
                                                    type: 'column',
                                                    backgroundColor: 'rgba(255, 255, 255, 0.1)'
                                                },
                                                title: {
                                                    text: 'Number of Sign Ins / Sign Outs by Day (This Month)'
                                                },
                                                subtitle: {
                                                    text: 'eReception Hub'
                                                },
                                                xAxis: {
                                                    title: {
                                                        text: 'Days of the Month',
                                                    },
                                                    max: s,
                                                type: "text",
                                                categories: data_scale,
                                                labels: {
                                                //format: "{value:%d}" 
                                                } 
                                                },
                                                yAxis: {
                                                    title: {
                                                        text: 'Sign Ins / Sign Outs'
                                                    }
                                                },
                                                legend: {
                                                    layout: 'vertical',
                                                    align: 'right',
                                                    verticalAlign: 'middle'
                                                },
                                                plotOptions: {
                                                    series: {
                                                        allowPointSelect: false
                                                    }
                                                },
                                                series: [{
                                                    name: 'Sign Ins',
                                                    data: data_in,
                                                    color: 'rgba(0, 75, 100, 0.5)'
                                                },
                                                {
                                                    name: 'Sign Outs',
                                                    data: data_out,
                                                    color: 'rgba(0, 180, 255, 0.5)'
                                                }],
                                                responsive: {
                                                    rules: [{
                                                        condition: {
                                                            maxWidth: 500
                                                        },
                                                        chartOptions: {
                                                            legend: {
                                                                layout: 'horizontal',
                                                                align: 'center',
                                                                verticalAlign: 'bottom'
                                                            },
                                                            
                                                        }
                                                    }]
                                                }
                                        });
        
    
                                </script>
        
    
                        <div class="col-md-4">
                        <div id="container" style="width:100%; height:300px;  margin-top: 10px; padding: 10px; border-radius: 10px; background-color: rgba(255, 255, 255, 0.4);"></div>
                        </div>
                                <script type="text/javascript">
                                    var users =  <?php echo json_encode($users) ?>;
                                    var labs =  <?php echo json_encode($labs) ?>;
                                    var cnt =  <?php echo json_encode($cnt) ?>;   
                                    var c = parseInt(cnt)-1 ;                              
                                   
                                    Highcharts.chart('container', {
                                        chart: {
                                            type: 'column',
                                            backgroundColor: 'rgba(255, 255, 255, 0.1)'
                                        },
                                        title: {
                                            text: 'Employees by Department'
                                        },
                                        subtitle: {
                                            text: 'eReception Hub'
                                        },
                                         xAxis: {
                                            categories: labs,
                                            max: c
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Employees by Department'
                                            }
                                        },
                                        legend: {
                                            layout: 'vertical',
                                            align: 'right',
                                            verticalAlign: 'middle'
                                        },
                                        plotOptions: {
                                            series: {
                                                allowPointSelect: false
                                            }
                                        },
                                        series: [{
                                            name: 'Employees',
                                            data: users,
                                            color: 'rgba(255, 255, 0, 0.5)'
                                        }],
                                        responsive: {
                                            rules: [{
                                                condition: {
                                                    maxWidth: 500
                                                },
                                                chartOptions: {
                                                    legend: {
                                                        layout: 'horizontal',
                                                        align: 'center',
                                                        verticalAlign: 'bottom'
                                                    },
                                                    
                                                }
                                            }]
                                        }
                                });

                                
                                </script>

                        <div class="col-md-4">
                        <div id="container2" style="width:100%; height:300px; margin-top: 10px; padding: 10px; border-radius: 10px; background-color: rgba(255, 255, 255, 0.4);"></div>
                        </div>
                                <script type="text/javascript">
                                    var vis =  <?php echo json_encode($vis) ?>;
                                   
                                    Highcharts.chart('container2', {
                                        chart: {
                                            type: 'bar',
                                            backgroundColor: 'rgba(255, 255, 255, 0.1)'
                                        },
                                        title: {
                                            text: 'Number of Visitors by Type'
                                        },
                                        subtitle: {
                                            text: '(This Month)'
                                        },
                                         xAxis: {
                                            categories: ['Visitors', 'Contractors' ],
                                            max:1
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Number of Visitors'
                                            }
                                        },
                                        legend: {
                                            layout: 'vertical',
                                            align: 'right',
                                            verticalAlign: 'middle'
                                        },
                                        plotOptions: {
                                            series: {
                                                allowPointSelect: false
                                            }
                                        },
                                        series: [{
                                            name: 'Visitors',
                                            data: vis,
                                            color: 'rgba(255, 132, 0, 0.5)'
                                        }],
                                        responsive: {
                                            rules: [{
                                                condition: {
                                                    maxWidth: 500
                                                },
                                                chartOptions: {
                                                    legend: {
                                                        layout: 'horizontal',
                                                        align: 'center',
                                                        verticalAlign: 'bottom'
                                                    },
                                                    
                                                }
                                            }]
                                        }
                                });

                                
                                </script> 

                        <div class="col-md-4">
                        <div id="container4" style="width:100%; height:300px; margin-top: 10px; padding: 10px; border-radius: 10px; background-color: rgba(255, 255, 255, 0.4);"></div>
                        </div>
                                <script type="text/javascript">
                                    var del =  <?php echo json_encode($deliver) ?>;
                                   
                                    Highcharts.chart('container4', {
                                        chart: {
                                            type: 'column',
                                            backgroundColor: 'rgba(255, 255, 255, 0.1)'
                                        },
                                        title: {
                                            text: 'Deliveries / Collections'
                                        },
                                        subtitle: {
                                            text: '(This Month)'
                                        },
                                         xAxis: {
                                            categories: ['Deliveries', 'Collections'],
                                            max: 1
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Deliveries / Collections'
                                            }
                                        },
                                        legend: {
                                            layout: 'vertical',
                                            align: 'right',
                                            verticalAlign: 'middle'
                                        },
                                        plotOptions: {
                                            series: {
                                                allowPointSelect: false
                                            }
                                        },
                                        series: [{
                                            name: 'Deliveries / Collections',
                                            data: del,
                                            color: 'rgba(72, 188, 60, 0.5)'
                                        }],
                                        responsive: {
                                            rules: [{
                                                condition: {
                                                    maxWidth: 500
                                                },
                                                chartOptions: {
                                                    legend: {
                                                        layout: 'horizontal',
                                                        align: 'center',
                                                        verticalAlign: 'bottom'
                                                    },
                                                    
                                                }
                                            }]
                                        }
                                });

                                
                                </script>                                



                            </div>
                        @include('inc.fire_checks')
                        <br><br>
                    <!--<iframe height="978px" width="100%" src="https://www.ons.gov.uk/visualisations/dvc811/msoamap/index.html"></iframe>-->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
