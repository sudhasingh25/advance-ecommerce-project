@extends('admin.admin_master')
@section('admin')

 <!-- Content Wrapper. Contains page content -->
 
	  <div class="container-full">
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">

		  

<!--Add Brand-->
          <div class="col-6">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form action="{{route('brand.update')}}" method="post" enctype="multipart/form-data" >
					  @csrf
                      <input type="hidden" name="id" value="{{$brand->id}}" class="form-control" > 
                      <input type="hidden" name="old_image" value="{{$brand->brand_image}}" class="form-control" > 

				
                                <div class="form-group">
                                    <h5>Brand Name En</h5>
                                    <div class="controls">
                                        <input id="brand_name_en" type="text" name="brand_name_en" value="{{$brand->brand_name_en}}" class="form-control" > 
                                        @error('brand_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           						
                                <div class="form-group">
                                    <h5>Brand Name Hi</h5>
                                    <div class="controls">
                                        <input id="brand_name_hi" type="text" name="brand_name_hi" value="{{$brand->brand_name_hi}}" class="form-control" > 
                                        @error('brand_name_hi')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           		
                                <div class="form-group">
                                    <h5>Brand Image</h5>
                                    <div class="controls">
                                        <input name="brand_image" id="brand_image" type="file" value="" class="form-control" > 
                                        @error('brand_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Update Brand">

					  </div>
						
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			 </div>
			  <!-- /.box -->
         
			</div>
			<!-- /.col-4 -->
		  
        
        
        </div>
          
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  
  

@endsection