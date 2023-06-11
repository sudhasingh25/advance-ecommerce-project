@extends('frontend.main_master')
@section('frontend_main')


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Forgot Password</li>
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
                    <h4 class="">Forgot Password</h4>
                        <form method="POST" action="{{ route('password.email') }}">
            @csrf								

                                <div class="form-group">
									<div class="input-group mb-3">
                                    <p style="color:#7e8694; font-size:14px" class="mb-2">
                            Forgot your password? No problem. Just let us know your email address and we 
                            will email you a password reset link that will allow you to choose a new one.
                            </p>

										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
										</div>
										<input id="email" class="form-control pl-15 bg-transparent text-white plc-white" type="email" name="email" placeholder="Your Email">
									</div>
								</div>
								  <div class="row">
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info  margin-top-10">Send Reset Password link to Email</button>
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
