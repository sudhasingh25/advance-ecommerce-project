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
				  <h3 class="box-title">Brand List</h3> 
				  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand en</th>
								<th>Brand hi</th>
								<th>Image</th>
								<th>Action</th>
                            </tr>
						</thead>
						<tbody>
                            @foreach($brand as $item)
							<tr>
								<td>{{$item->brand_name_en}}</td>
								<td>{{$item->brand_name_hi}}</td>
								<td><img src="{{asset($item->brand_image)}}" style="width:60px; height:40px;"></td>
								<td>
                                    <a href="{{route('brand.edit',$item->id)}}" title="Edit"class="btn btn-info" ><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('brand.delete',$item->id)}}" title="Delete" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
				  <h3 class="box-title">Add Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data" >
					  @csrf
                        						
                                <div class="form-group">
                                    <h5>Brand Name En</h5>
                                    <div class="controls">
                                        <input id="brand_name_en" type="text" name="brand_name_en" value="" class="form-control" > 
                                        @error('brand_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                           						
                                <div class="form-group">
                                    <h5>Brand Name Hi</h5>
                                    <div class="controls">
                                        <input id="brand_name_hi" type="text" name="brand_name_hi" value="" class="form-control" > 
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
                           
							
                        
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Add Brand">

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