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
					<form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
					  @csrf
                        <div class="row">
						<div class="col-12">						
							<div class="form-group">
								<h5>Email</h5>
								<div class="controls">
									<input type="email" name="email" id="email" value="{{$editData->email}}" class="form-control" > 
                                    <div class="help-block"></div></div>
							</div>
							<div class="form-group">
								<h5>Name</h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" value="{{$editData->name}}"> <div class="help-block"></div></div>
							</div>

						</div>

                        <div class="col-6">
                            <div class="form-group">
								<h5>Profile Image</h5>
								<div class="controls">
                                    <input type="file" class="form-control" id="image"  name="profile_photo_path">
                                    <div class="help-block"></div>
                                </div>
							</div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
								<div class="controls">
                                <img id="showImage" class="rounded" style="width:100px; height:100px" src="{{(!empty($editData->profile_photo_path))? url('upload/admin_images/'.$editData->profile_photo_path): url('upload/no_image.png')}}" alt="User Avatar">

                                    <div class="help-block"></div>
                                </div>
							</div>
                        </div>
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Update Profile">

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


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader=new FileReader();
            reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>
@endsection