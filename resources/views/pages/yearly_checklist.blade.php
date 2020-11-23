@extends('layouts.fire')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <a href="/firesafety" class="btn btn-primary btn-sm pull-right"> <i class="fa fa-arrow-left"> </i> Go Back </a>
                <div class="panel-header"><h2>{{ __('messages.yearly') }}</h2></div>

                <div class="panel-body">

                    <form action="{{ route('pagescontroller.yearly_checklist') }}" method="post">
                        {{ csrf_field() }}
                        <h3 style="color: #ffdd00;">Escape Routes</h3>
                        <!-- ============== DQ1 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q1. Do all self-closing fire doors work correctly?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response1" id="response1" onclick="divid1(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response1" id="response1" onclick="divid1(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response1" id="response1" onclick="divid1(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report1" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report1" maxlength="500"> 
                            </div>
                            <script>
                                function divid1(val){
                                    var response1 = val;
                                    if(response1 === 'YES'){ document.getElementById('report1').style.display = 'none'; }
                                    if(response1 === 'NO'){ document.getElementById('report1').style.display = 'block'; }
                                    if(response1 === 'NA'){ document.getElementById('report1').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ2 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q2. Is escape route compartmentation in working order?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response2" id="response2" onclick="divid2(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response2" id="response2" onclick="divid2(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response2" id="response2" onclick="divid2(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report2" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report2" maxlength="500"> 
                            </div>
                            <script>
                                function divid2(val){
                                    var response2 = val;
                                    if(response2 === 'YES'){ document.getElementById('report2').style.display = 'none'; }
                                    if(response2 === 'NO'){ document.getElementById('report2').style.display = 'block'; }
                                    if(response2 === 'NA'){ document.getElementById('report2').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <h3 style="color: #ffdd00;">Escape Lighting</h3>
                        <!-- ============== DQ3 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q3. Do all emergency lights operate on test for their full rated duration? </label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response3" id="response3" onclick="divid3(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response3" id="response3" onclick="divid3(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response3" id="response3" onclick="divid3(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report3" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report3" maxlength="500"> 
                            </div>
                            <script>
                                function divid3(val){
                                    var response3 = val;
                                    if(response3 === 'YES'){ document.getElementById('report3').style.display = 'none'; }
                                    if(response3 === 'NO'){ document.getElementById('report3').style.display = 'block'; }
                                    if(response3 === 'NA'){ document.getElementById('report3').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <!-- ============== DQ4 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q4. Has the system been checked by a competent person? </label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response4" id="response4" onclick="divid4(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response4" id="response4" onclick="divid4(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response4" id="response4" onclick="divid4(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report4" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report4" maxlength="500"> 
                            </div>
                            <div id="comp4" style="display: none;">
                                <label style="font-size:18px;">Enter Competent Person Name</label><br>
                                <input type="text" class="form-control" name="name4" maxlength="500"> 
                                <label style="font-size:18px;">Company Address</label><br>
                                <input type="text" class="form-control" name="company4" maxlength="500"> 
                                <label style="font-size:18px;">Contact Telephone Number</label><br>
                                <input type="text" class="form-control" name="telephone4" maxlength="500"> 
                            </div>
                            <script>
                                function divid4(val){
                                    var response4 = val;
                                    if(response4 === 'YES'){ document.getElementById('report4').style.display = 'none'; comp4(response4); }
                                    if(response4 === 'NO'){ document.getElementById('report4').style.display = 'block'; comp4(response4);}
                                    if(response4 === 'NA'){ document.getElementById('report4').style.display = 'none'; comp4(response4);}
                                }
                                function comp4(val){
                                    var comp4 = val;
                                    if(comp4 === 'YES'){ document.getElementById('comp4').style.display = 'block'; }
                                    if(comp4 === 'NO'){ document.getElementById('comp4').style.display = 'none'; }
                                    if(comp4 === 'NA'){ document.getElementById('comp4').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <h3 style="color: #ffdd00;">Fire Equipment</h3>
                        <!-- ============== DQ5 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q5. Has all fire equipment been checked by a competent person?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response5" id="response5" onclick="divid5(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response5" id="response5" onclick="divid5(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <br>
                            <div id="report5" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report5" maxlength="500"> 
                            </div>
                            <div id="comp5" style="display: none;">
                                <label style="font-size:18px;">Enter Competent Person Name</label><br>
                                <input type="text" class="form-control" name="name5" maxlength="500"> 
                                <label style="font-size:18px;">Company Address</label><br>
                                <input type="text" class="form-control" name="company5" maxlength="500"> 
                                <label style="font-size:18px;">Contact Telephone Number</label><br>
                                <input type="text" class="form-control" name="telephone5" maxlength="500"> 
                            </div>
                            <script>
                                function divid5(val){
                                    var response5 = val;
                                    if(response5 === 'YES'){ document.getElementById('report5').style.display = 'none'; comp5(response5);}
                                    if(response5 === 'NO'){ document.getElementById('report5').style.display = 'block'; comp5(response5);}
                                }
                                function comp5(val){
                                    var comp5 = val;
                                    if(comp5 === 'YES'){ document.getElementById('comp5').style.display = 'block'; }
                                    if(comp5 === 'NO'){ document.getElementById('comp5').style.display = 'none'; }
                                }

                            </script>
                            <hr>
                        </div>
                        <h3 style="color: #ffdd00;">Electrical Equipment</h3>
                        <!-- ============== DQ6 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q6. Has PAT testing been carried out by a competent person?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response6" id="response6" onclick="divid6(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response6" id="response6" onclick="divid6(this.value)" class="checkmark" value="NO" required>
                            </span><br>
                            <div id="report6" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report6" maxlength="500"> 
                            </div>
                            <div id="comp6" style="display: none;">
                                <label style="font-size:18px;">Enter Competent Person Name</label><br>
                                <input type="text" class="form-control" name="name6" maxlength="500"> 
                                <label style="font-size:18px;">Company Address</label><br>
                                <input type="text" class="form-control" name="company6" maxlength="500"> 
                                <label style="font-size:18px;">Contact Telephone Number</label><br>
                                <input type="text" class="form-control" name="telephone6" maxlength="500"> 
                            </div>
                            <script>
                                function divid6(val){
                                    var response6 = val;
                                    if(response6 === 'YES'){ document.getElementById('report6').style.display = 'none'; comp6(response6);}
                                    if(response6 === 'NO'){ document.getElementById('report6').style.display = 'block'; comp6(response6);}
                                }
                                function comp6(val){
                                    var comp6 = val;
                                    if(comp6 === 'YES'){ document.getElementById('comp6').style.display = 'block'; }
                                    if(comp6 === 'NO'){ document.getElementById('comp6').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <h3 style="color: #ffdd00;">Gas Equipment</h3>
                        <!-- ============== DQ7 ========================= -->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label style="font-size:18px;">Q7. Have all gas appliances (boilers, heaters etc) been tested by a competent person?</label><br>
                            <span style="font-size: 17px;">
                                YES: <input type="radio" name="response7" id="response7" onclick="divid7(this.value)" class="checkmark" value="YES" required>
                            </span>
                            <span style="font-size: 17px;">
                                NO: <input type="radio" name="response7" id="response7" onclick="divid7(this.value)" class="checkmark" value="NO" required>
                            </span>
                            <span style="font-size: 17px;">
                                N/A: <input type="radio" name="response7" id="response7" onclick="divid7(this.value)" class="checkmark" value="NA" required>
                            </span><br>
                            <div id="report7" style="display: none;">
                                <label style="font-size:18px;">If no, enter details.</label><br>
                                <input type="text" class="form-control" name="report7" maxlength="500"> 
                            </div>
                            <div id="comp7" style="display: none;">
                                <label style="font-size:18px;">Enter Competent Person Name</label><br>
                                <input type="text" class="form-control" name="name7" maxlength="500"> 
                                <label style="font-size:18px;">Company Address</label><br>
                                <input type="text" class="form-control" name="company7" maxlength="500"> 
                                <label style="font-size:18px;">Contact Telephone Number</label><br>
                                <input type="text" class="form-control" name="telephone7" maxlength="500"> 
                            </div>
                            <script>
                                function divid7(val){
                                    var response7 = val;
                                    if(response7 === 'YES'){ document.getElementById('report7').style.display = 'none'; comp7(response7);}
                                    if(response7 === 'NO'){ document.getElementById('report7').style.display = 'block'; comp7(response7);}
                                    if(response7 === 'NA'){ document.getElementById('report7').style.display = 'none'; comp7(response7);}
                                }
                                function comp7(val){
                                    var comp7 = val;
                                    if(comp7 === 'YES'){ document.getElementById('comp7').style.display = 'block'; }
                                    if(comp7 === 'NO'){ document.getElementById('comp7').style.display = 'none'; }
                                    if(comp7 === 'NA'){ document.getElementById('comp7').style.display = 'none'; }
                                }
                            </script>
                            <hr>
                        </div>
                        <button class="btn btn-primary" type="submit"> Submit </button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var delay = 0;
    var offset = 150;
    
    document.addEventListener('invalid', function(e){
       $(e.target).addClass("invalid");
       $('html, body').animate({scrollTop: $($(".invalid")[0]).offset().top - offset }, delay);
    }, true);
    document.addEventListener('change', function(e){
       $(e.target).removeClass("invalid")
    }, true);
</script>
@endsection
