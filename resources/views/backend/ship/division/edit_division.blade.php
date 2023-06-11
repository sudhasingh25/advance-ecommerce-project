@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">




<!--   ------------ Add District Page -------- -->


          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Division </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


<form method="post" action="{{route('update.division',$division->id)}}" >
	 	@csrf



<div class="form-group">
	<h5>State Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="state_id" class="form-control"  >
			<option value="" selected="" disabled="">Select State</option>
			@foreach($states as $state)
			<option value="{{ $state->id }}"  {{$state->id==$division->state_id ?'selected':''}}>{{ $state->state_name }}</option>	
			@endforeach
		</select>
		@error('state_id') 
		<span class="text-danger">{{ $message }}</span>
		@enderror 
		</div>
	</div>

<div class="form-group">
	<h5>District Name  <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="district_id" class="form-control"  >
			<option value="" selected="" disabled="">Select District</option>
			@foreach($district as $dis)
			<option value="{{ $dis->id }}" {{$dis->id==$division->district_id ?'selected':''}}>{{ $dis->district_name }}</option>	
			@endforeach
		</select>
		@error('district_id') 
		<span class="text-danger">{{ $message }}</span>
		@enderror 
	</div>
</div>

	<div class="form-group">
		<h5>Division Name  <span class="text-danger">*</span></h5>
		<div class="controls">
			<input type="text"  name="division_name" value="{{$division->division_name}}" class="form-control" > 
			@error('division_name') 
			<span class="text-danger">{{ $message }}</span>
			@enderror 
		</div>
	</div>




	<div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">					 
	</div>
</form>





					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>




		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="state_id"]').on('change', function(){
            var state_id = $(this).val();
            if(state_id) {
                $.ajax({
                    url: "{{  url('/shipping/add-division/ajax') }}/"+state_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="district_id"]').html('');

                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">'
							   + value.district_name + '</option>');
							   //alert("call");
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
	});
</script>
@endsection