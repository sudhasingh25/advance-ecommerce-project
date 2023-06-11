@extends('admin.admin_master')
@section('admin')

 <!-- Content Wrapper. Contains page content -->
 
	  <div class="container-full">
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		   <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <!-- <h3 class="box-title">Sub Category List</h3> -->
				  <h3 class="box-title">SubCategory List <span class="badge badge-pill badge-danger"> {{ count($subcategory) }} </span> </h3>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category</th>
								<th>Sub Category en</th>
								<th>Sub Category hi</th>
								
								<th>Action</th>
                            </tr>
						</thead>
						<tbody>
                            @foreach($subcategory as $item)
							<tr>
								<td>{{$item['category']['category_name_en']}}</td>
								<td>{{$item->subcategory_name_en}}</td>
								<td>{{$item->subcategory_name_hi}}</td>
								
								<td>
                                    <a href="{{route('subcategory.edit',$item->id)}}" title="Edit"class="btn btn-info" ><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('subcategory.delete',$item->id)}}" title="Delete" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
							
							</tr>
							@endforeach
                            
						</tbody>
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
         
			</div>
			<!-- /.col -->
		  

<!--Add Brand-->
          <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form action="{{route('subcategory.store')}}" method="post" >
					  @csrf
					  				<div class="form-group">
                                    	<h5>Category</h5>
                                    	<div class="controls">
											<select name="category_id" class="form-control">
												<option value="">Select Category</option>
												@foreach($categories as $category)
												<option value="{{$category->id}}">{{$category->category_name_en}}</option>
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
                                        <input id="subcategory_name_en" type="text" name="subcategory_name_en" value="" class="form-control" > 
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           						
                                <div class="form-group">
                                    <h5>SubCategory Name Hi</h5>
                                    <div class="controls">
                                        <input id="subcategory_name_hi" type="text" name="subcategory_name_hi" value="" class="form-control" > 
                                        @error('subcategory_name_hi')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           		
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Add SubCategory">

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