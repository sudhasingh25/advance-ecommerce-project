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
				  <h3 class="box-title">Edit Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form action="{{route('category.update')}}" method="post"  >
					  @csrf
                        		<input type="hidden" name="id" value="{{$category->id}}" class="form-control">			
                                <div class="form-group">
                                    <h5>Category Name En</h5>
                                    <div class="controls">
                                        <input id="category_name_en" type="text" name="category_name_en" value="{{$category->category_name_en}}" class="form-control" > 
                                        
                                    </div>
                                </div>
                           						
                                <div class="form-group">
                                    <h5>Category Name Hi</h5>
                                    <div class="controls">
                                        <input id="category_name_hi" type="text" name="category_name_hi" value="{{$category->category_name_hi}}" class="form-control" > 
                                        
                                    </div>
                                </div>
                           		
                                <div class="form-group">
                                    <h5>Category Icon</h5>
                                    <div class="controls">
                                        <input name="category_icon" id="category_icon" type="text" value="{{$category->category_icon}}" class="form-control" > 
                                        
                                    </div>
                                </div>
                           
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Update Category">

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