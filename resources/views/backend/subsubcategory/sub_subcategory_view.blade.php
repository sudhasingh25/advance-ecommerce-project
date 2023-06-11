@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


 <!-- Content Wrapper. Contains page content -->
 
	  <div class="container-full">
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		   <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				   <h3 class="box-title">Sub SubCategory List</h3>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category</th>
                                <th>SubCategory</th>
								<th>Sub Sub Category en</th>
								<th>Sub Sub Category hi</th>
								
								<th>Action</th>
                            </tr>
						</thead>
						<tbody>
                            @foreach($sub_subcategory as $item)
							<tr>
								<td>{{$item['category']['category_name_en']}}</td>
								<td>{{$item['subcategory']['subcategory_name_en']}}</td>
								<td>{{$item->sub_subcategory_name_en}}</td>
								<td>{{$item->sub_subcategory_name_hi}}</td>
								
								<td class="d-flex justify-space-between">
                                    <a href="{{route('subsubcategory.edit',$item->id)}}" title="Edit"class="btn btn-info btn-sm mr-1" ><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('subsubcategory.delete',$item->id)}}" title="Delete" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
				  <h3 class="box-title">Add Sub SubCategory</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form action="{{route('subsubcategory.store')}}" method="post" >
					  @csrf
					  				<div class="form-group">
                                    	<h5>Category</h5>
                                    	<div class="controls">
											<select name="category_id" class="form-control">
												<option value="" selected="" disabled="">Select Category</option>
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
                                    	<h5>Sub Category</h5>
                                    	<div class="controls">
											<select name="subcategory_id" class="form-control">
												<option value="" selected="" disabled="">
													Select SubCategory
												</option>
												
											</select>
											@error('subcategory_id')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
										</div>
									</div>

                                <div class="form-group">
                                    <h5>Sub SubCategory Name En</h5>
                                    <div class="controls">
                                        <input id="sub_subcategory_name_en" type="text" name="sub_subcategory_name_en" value="" class="form-control" > 
                                        @error('sub_subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           						
                                <div class="form-group">
                                    <h5>Sub SubCategory Name Hi</h5>
                                    <div class="controls">
                                        <input id="sub_subcategory_name_hi" type="text" name="sub_subcategory_name_hi" value="" class="form-control" > 
                                        @error('sub_subcategory_name_hi')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           		
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Add Sub SubCategory">

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
  
    <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/sub/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'
							   + value.subcategory_name_en + '</option>');
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