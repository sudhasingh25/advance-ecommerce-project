@extends('frontend.main_master')
@section('frontend_main')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Reset</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
                <div class="col-md-12 col-sm-12 sign-in">
                    <h4 class="">Reset Password</h4>
                                    
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf	
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
						
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                    <input id="email" type="email" name="email"   class="form-control pl-15 bg-transparent text-white plc-white"  placeholder="Your Email">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                    <input id="password" type="password" name="password"   class="form-control pl-15 bg-transparent text-white plc-white" placeholder="New Password">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"   class="form-control unicase-form-control text-input" placeholder="Confirm Password">
                            </div>
                
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info  margin-top-10">Reset Password</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>	
                </div>
            </div>
        </div>
    </div>
</div>




        @include('frontend.body.brands')


@endsection
