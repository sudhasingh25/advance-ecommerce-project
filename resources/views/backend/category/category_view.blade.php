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
				  <!-- <h3 class="box-title">Category List</h3> -->
				  <h3 class="box-title">Category List <span class="badge badge-pill badge-danger"> {{ count($category) }} </span></h3>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category Icon</th>
								<th>Category en</th>
								<th>Category hi</th>
								
								<th>Action</th>
                            </tr>
						</thead>
						<tbody>
                            @foreach($category as $item)
							<tr>
								<td><i class="{{$item->category_icon}}"></i></td>
								<td>{{$item->category_name_en}}</td>
								<td>{{$item->category_name_hi}}</td>
								
								<td>
                                    <a href="{{route('category.edit',$item->id)}}" title="Edit"class="btn btn-info" ><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('category.delete',$item->id)}}" title="Delete" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
				  <h3 class="box-title">Add Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data" >
					  @csrf
                        						
                                <div class="form-group">
                                    <h5>Category Name En</h5>
                                    <div class="controls">
                                        <input id="category_name_en" type="text" name="category_name_en" value="" class="form-control" > 
                                        @error('category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           						
                                <div class="form-group">
                                    <h5>Category Name Hi</h5>
                                    <div class="controls">
                                        <input id="category_name_hi" type="text" name="category_name_hi" value="" class="form-control" > 
                                        @error('category_name_hi')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           		
                                <div class="form-group">
                                    <h5>Category Icon</h5>
                                    <div class="controls">
                                        <input name="category_icon" id="category_icon" type="text" value="" class="form-control" > 
                                        @error('category_icon')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Add Category">

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