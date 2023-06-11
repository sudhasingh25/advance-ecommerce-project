@extends('admin.admin_master')
@section('admin')

 <!-- Content Wrapper. Contains page content -->
 
	  <div class="container-full">
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		

<!--Add Brand-->
          <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form action="{{route('subcategory.update')}}" method="post" >
					  @csrf
                            <input type="hidden" name="id" value="{{$subcategory->id}}" class="form-control">
					  				<div class="form-group">
                                    	<h5>Category</h5>
                                    	<div class="controls">
											<select name="category_id" class="form-control">
												<option value="">Select Category</option>
												@foreach($categories as $category)
												<option value="{{$category->id}}"{{$category->id==$subcategory->category_id?'selected':''}}>{{$category->category_name_en}}</option>
												@endforeach
											</select>
											@error('category_id')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
										</div>
									</div>
                        						
                                <div class="form-group">
                                    <h5>SubCategory Name En</h5>
                                    <div class="controls">
                                        <input id="subcategory_name_en" type="text" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}" class="form-control" > 
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           						
                                <div class="form-group">
                                    <h5>SubCategory Name Hi</h5>
                                    <div class="controls">
                                        <input id="subcategory_name_hi" type="text" value="{{$subcategory->subcategory_name_hi}}" name="subcategory_name_hi"  class="form-control" > 
                                        @error('subcategory_name_hi')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           		
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Update SubCategory">

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