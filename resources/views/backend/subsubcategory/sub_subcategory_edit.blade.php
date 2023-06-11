@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


 <!-- Content Wrapper. Contains page content -->
 
	  <div class="container-full">
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		  

<!--Add Brand-->
          <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Sub SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form action="{{route('subsubcategory.update')}}" method="post" >
					  @csrf
					  <input type="hidden" value="{{$subsubcategory->id}}" name="id">
					  				<div class="form-group">
                                    	<h5>Category</h5>
                                    	<div class="controls">
											<select name="category_id" class="form-control">
												<option value="" selected="" disabled="">Select Category</option>
												@foreach($categories as $category)
												<option value="{{$category->id}}"  {{ $category->id==$subsubcategory->category_id?'selected':'' }}>{{$category->category_name_en}}</option>
												@endforeach
											</select>
											@error('category_id')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
										</div>
									</div>
                        				
                                    
                                    <div class="form-group">
                                    	<h5>Sub Category</h5>
                                    	<div class="controls">
											<select name="subcategory_id" class="form-control">
												<option value="" selected="" disabled="">
													Select SubCategory
												</option>
												@foreach($subcategories as $subcat)
												<option value="{{$subcat->id}}"  {{ $subcat->id==$subsubcategory->subcategory_id?'selected':'' }}>{{$subcat->subcategory_name_en}}</option>
												@endforeach
												
											</select>
											@error('subcategory_id')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
										</div>
									</div>

                                <div class="form-group">
                                    <h5>Sub SubCategory Name En</h5>
                                    <div class="controls">
                                        <input id="sub_subcategory_name_en" type="text" name="sub_subcategory_name_en" value="{{$subsubcategory->sub_subcategory_name_en}}" class="form-control" > 
                                        @error('sub_subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           						
                                <div class="form-group">
                                    <h5>Sub SubCategory Name Hi</h5>
                                    <div class="controls">
                                        <input id="sub_subcategory_name_hi" type="text" name="sub_subcategory_name_hi" value="{{$subsubcategory->sub_subcategory_name_hi}}" class="form-control" > 
                                        @error('sub_subcategory_name_hi')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           		
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Update Sub SubCategory">

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