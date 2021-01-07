@extends('layouts.hub')

@section('content')
@include('inc.status_check')
    <div class="container">
        <div class="row">
            <div class="logo">
                @if(count($company ?? '') > 0)
                    @foreach($company ?? '' as $comp)
                        <?php $cpy = $comp->company_name; ?>
                        @if($comp->company_logo == '')
                            <img src="https://ereceptionhub.co.uk/storage/images/default_logo.png" style="max-width: 25vw; max-height: 25vh;">
                        @else 
                            <img src="https://ereceptionhub.co.uk/storage{{ $comp->company_logo }}" style="max-width: 25vw; max-height: 25vh;">
                        @endif
                    @endforeach
                @endif
            </div>
            <center><h1 class="welcome"><span style="font-size: 4vw;">{{ __('messages.choose') }}<br>{{ __('messages.option') }}</span></h1></center><br><br><br>
        </div>
        <div class="row">
            <center>
                <div id="signin_out">
                    @if(app()->isLocale('en'))
                    <center>
                        <a href="#" data-toggle="modal" data-target="#department"> 
                            <img src="https://ereceptionhub.co.uk/storage/images/staff.png" style="max-height: 14vh; max-width: 35vw;" class="butns">
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" data-toggle="modal" data-target="#visitor"> 
                            <img src="https://ereceptionhub.co.uk/storage/images/visitor.png" style="max-height: 14vh; max-width: 35vw;" class="butns">
                        </a>
                        <br>
                        <a href="#" data-toggle="modal" data-target="#delivery"> 
                            <img src="https://ereceptionhub.co.uk/storage/images/delivery_b.png" style="max-height: 14vh; max-width: 35vw;" class="butns">
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" data-toggle="modal" data-target="#contractor"> 
                            <img src="https://ereceptionhub.co.uk/storage/images/contractor_b.png" style="max-height: 14vh; max-width: 35vw;" class="butns">
                        </a>
                        <br>
                    </center>
                    @else
                    <center>
                        <a href="#" data-toggle="modal" data-target="#department"> 
                            <img src="https://ereceptionhub.co.uk/storage/images/staff.png" style="max-height: 14vh; max-width: 35vw;" class="butns">
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" data-toggle="modal" data-target="#visitor"> 
                            <img src="https://ereceptionhub.co.uk/storage/images/visitor_w.png" style="max-height: 14vh; max-width: 35vw;" class="butns">
                        </a>
                        <br>
                        <a href="#" data-toggle="modal" data-target="#delivery"> 
                            <img src="https://ereceptionhub.co.uk/storage/images/delivery_w.png" style="max-height: 14vh; max-width: 35vw;" class="butns">
                        </a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" data-toggle="modal" data-target="#contractor"> 
                            <img src="https://ereceptionhub.co.uk/storage/images/contractor_w.png" style="max-height: 14vh; max-width: 35vw;" class="butns">
                        </a>
                        <br>
                    </center>
                    @endif
                </div>
            </center>
        </div>
            <a href="/hub" class="btn btn-primary btn-lg" style="position: absolute; top: 100px; right: 150px;"> <i class="fa fa-arrow-left"> </i> Go Back </a>
    </div>

<div class="modal fade" tabindex="-1" role="dialog" id="department">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Search By Department or Employee Name</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('ereception.department') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <label  style="color: #333;">Department - (Please choose a Department from the Dropdown)</label>
                    <!-- Read in from DB -->
                    <select name="dept" class="form-control">
                        <option value=""  disabled selected> --- Please Select --- </option>
                        @foreach($department as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->department_name }}</option>
                        @endforeach
                    </select>                        
                </div>
                <button type="submit" name="submit" class="btn btn-success" style="min-width:250px;">
                    <i class="fa fa-search fa-lg"></i> Search Department
                </button>
            </form>
            <br><b style="color: #333;">Or Search by Employee Name</b><br><br>
            <form action="{{ route('ereception.name') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <label  style="color: #333;">Employee Name - (Hint! Only part of a first or last name required)</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <button type="submit" name="submit" class="btn btn-success" style="min-width:250px;">
                    <i class="fa fa-search fa-lg"></i> Search Name
                </button>
            </form>                
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->   

<div class="modal fade" tabindex="-1" role="dialog" id="visitor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Visitor Sign In</h4>
        </div>
        <div class="modal-body">
            <h5 style="color: #333;">(NB! All Visitors are required to sign in for Fire Safety)</h5>
            <form action="{{ route('ereception.visitor') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <label  style="color: #333;">Your Name</label>
                    <input type="text" class="form-control" name="name" required>
                    <label  style="color: #333;">Visiting Who? (Please choose from the Dropdown)</label>
                    <!-- Read in from DB -->
                    <select name="who" class="form-control" required>
                        <option value=""  disabled selected> --- Please Select --- </option>
                        @foreach($people as $p)
                            <option value="{{ $p->id }}">{{ $p->first_name }} {{ $p->last_name }} - {{ $p->job_title }}</option>
                        @endforeach
                    </select>  
                    <label  style="color: #333;">Your Car Registration - Only required if you have a vehicle parked on site</label>
                    <input type="text" class="form-control" name="car_reg">
                    <label  style="color: #333;">Your Company Name</label>
                    <input type="text" class="form-control" name="from_company" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success" style="min-width:250px;">
                    <i class="fa fa-sign-in fa-lg"></i> Sign In
                </button>
            </form>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="delivery">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Delivery / Collection Notification</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('ereception.delivery') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <label  style="color: #333;">Delivery or Collection  - Please Choose</label>
                    <select name="del_type" class="form-control" required>
                        <option value="" disabled selected> -- Please Choose an Option -- </option>
                        <option value="Delivery"> Delivery </option>
                        <option value="Collection"> Collection </option>
                    </select>    
                    <label  style="color: #333;">Who is the delivery / collection for? (Please choose from the Dropdown)</label>
                    <!-- Read in from DB -->
                    <select name="who" class="form-control" required>
                        <option value=""  disabled selected> --- Please Select --- </option>
                        @foreach($people as $p)
                            <option value="{{ $p->id }}">{{ $p->first_name }} {{ $p->last_name }} - {{ $p->job_title }}</option>
                        @endforeach
                    </select>  
                    <label  style="color: #333;">Your Company Name</label>
                    <input type="text" class="form-control" name="from_company" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success" style="min-width:250px;">
                    <i class="fa fa-truck fa-lg"></i> Register Delivery / Collection
                </button>
            </form>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="contractor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-success" style="color: #333;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Contractor</h4>
        </div>
        <div class="modal-body">
            <form action="{{ route('ereception.contractor') }}" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <label  style="color: #333;">Your Name</label>
                    <input type="text" class="form-control" name="name" required>
                    <label  style="color: #333;">Visiting Who? (Please choose from the Dropdown)</label>
                    <!-- Read in from DB -->
                    <select name="who" class="form-control" required>
                        <option value=""  disabled selected> --- Please Select --- </option>
                        @foreach($people as $p)
                            <option value="{{ $p->id }}">{{ $p->first_name }} {{ $p->last_name }} - {{ $p->job_title }}</option>
                        @endforeach
                    </select>  
                    <label  style="color: #333;">Your Car / Van Registration - Only required if you have a vehicle parked on site</label>
                    <input type="text" class="form-control" name="car_reg">
                    <label  style="color: #333;">Your Company Name</label>
                    <input type="text" class="form-control" name="from_company" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success" style="min-width:250px;">
                    <i class="fa fa-sign-in fa-lg"></i> Sign In
                </button>
            </form>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



@endsection
