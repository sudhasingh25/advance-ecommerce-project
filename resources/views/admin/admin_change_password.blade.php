@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">

<section class="content">
    <div class="row">
        <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile Edit</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col-12">
					<form action="{{route('admin.password.update')}}" method="post" >
					  @csrf
                        <div class="row">
                            <div class="col-6">						
                                <div class="form-group">
                                    <h5>Current Password</h5>
                                    <div class="controls">
                                        <input id="current_password" type="password" name="old_password" value="" class="form-control" > 
                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">						
                                <div class="form-group">
                                    <h5>New Password</h5>
                                    <div class="controls">
                                        <input id="password" type="password" name="password" value="" class="form-control" > 
                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">						
                                <div class="form-group">
                                    <h5>Confirm Password</h5>
                                    <div class="controls">
                                        <input name="password_confirmation" id="password_confirmation" type="password" value="" class="form-control" > 
                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                        </div>
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Change Password">

					  </div>
						
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
        </div>
    </section>
</div>

@endsection