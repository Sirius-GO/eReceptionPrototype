<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2><?php echo e(__('messages.subscriptions')); ?></h2></div>
                    <div class="panel-body">

                        <center>
                            <h2>Please choose from our monthly subscription or yearly payment options</h2>                             
                            <hr>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="Q5R24LTDLZU4W">
                            <input type="hidden" name="page_style" value="primary">
                            <table>
                            <tr><td align="center"><input type="hidden" name="on0" value="Subscription Options">
                                <h3>Pay Monthly Subscription Options</h3>
                            </td></tr><tr><td>
                            <select name="os0" style="color: #333;" class="form-control">
                                <option value="Bronze pcm">Bronze pcm : £35.00 GBP - monthly</option>
                                <option value="Silver pcm">Silver pcm : £45.00 GBP - monthly</option>
                                <option value="Gold pcm">Gold pcm : £60.00 GBP - monthly</option>
                                <option value="Test">Test - £0.01</option>                                    
                            </select> </td></tr>
                            </table><br>
                            <input type="hidden" name="currency_code" value="GBP">
                            <button class="btn btn-primary btn-lg" name="submit" alt="PayPal – The safer, easier way to pay online!"><i class="fa fa-paypal fa-lg"></i> Buy Subscription</button>
                            <br><br>
                            <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/payments_accepted.png" width="300px;">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                            </form>
                            <br><br>
                            (NB! A PayPal account is required for Pay Monthly options)<br>
                            <h3>Already have a PayPal account</h3>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 bbx">
                                    <p>1.<br>Choose Subscription<br>Option<br><i class="fa fa-arrow-right"></i></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 bbx">
                                    <p>2.<br>Click Buy<br>Subscription<br><i class="fa fa-arrow-right"></i></p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 bbx">
                                    <p>3.<br>Confirm<br>Payment<br><i class="fa fa-check"></i> </p>
                                </div>
                            </div>

                            <h3>Don't have a PayPal account</h3>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 bbx">
                                    <p>1.<br>Choose Subscription<br>Option<br><i class="fa fa-arrow-right"></i> </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 bbx">
                                    <p>2.<br>Click Buy<br>Subscription<br><i class="fa fa-arrow-right"></i> </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 bbx">
                                    <p>3.<br>Complete PayPal<br>Sign-Up Details<br><i class="fa fa-arrow-right"></i> </p>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 bbx">
                                    <p>4.<br>Confirm<br>Payment<br><i class="fa fa-check"></i> </p>
                                </div>
                            </div>
                            <img src="http://localhost:8080/ereceptionhub/storage/app/public//images/secure1.png" align="right">
                            <br><br><br><br><br>
                            <hr>
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="CX383ML922SE6">
                                <table>
                                <tr>
                                    <td align="center">
                                     <input type="hidden" name="on0" value="Plan"><h3> Pay Yearly Options </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="os0" class="form-control">
                                            <option value="Bronze">Bronze pa : £365.00 GBP - yearly - Save £55.00</option>
                                            <option value="Silver">Silver pa : £498.00 GBP - yearly - Save £42.00</option>
                                            <option value="Gold">Gold pa : £650.00 GBP - yearly - Save £70.00</option>                                    
                                            <option value="Test2">Test2 - £0.01</option>                                    
                                        </select><br>
                                    </td>
                                </tr>
                                </table>
                                <input type="hidden" name="currency_code" value="GBP">
                                <button class="btn btn-primary btn-lg" name="submit" alt="PayPal – The safer, easier way to pay online!"><i class="fa fa-paypal fa-lg"></i> Buy Now </button>
                                <br><br>
                                <img src="http://localhost:8080/ereceptionhub/storage/app/public/images/payments_accepted.png" width="300px;">
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                                </form>
                                <br>
                                <img src="http://localhost:8080/ereceptionhub/storage/app/public//images/secure.png" align="right">
                                <br><br><br><br><br><br>

                                <hr>
                                <br>


                            <h3>We pride ourselves on our no quibble, Monthly Subscription, cancellation policy.
                            <br><br>
                            Not for you? Click here to unsubscribe.</h3>
                            <br>
                            <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=LMQA78Q3LT3SY" class="btn btn-primary">
                                <i class="fa fa-paypal fa-lg"></i> Unsubscribe    
                            </a>
                            <br><br>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\ereceptionhub\resources\views/pages/subscriptions.blade.php ENDPATH**/ ?>