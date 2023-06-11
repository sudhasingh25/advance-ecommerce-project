@extends('admin.admin_master')
@section('admin')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->

	  <div class="container-full">
			  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                      @csrf  
					  <div class="row">
						<div class="col-12">	
                            
                            <div class="row">   <!-- 1st row-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                    	<h5>Brand</h5>
                                    	<div class="controls">
											<select name="brand_id" class="form-control">
												<option value="">Select Brand</option>
												@foreach($brands as $brand)
												<option value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
												@endforeach
											</select>
											@error('brand_id')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
										</div>
									</div>
                                </div>
                                <div class="col-md-4">
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
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    	<h5>SubCategory</h5>
                                    	<div class="controls">
											<select name="subcategory_id" class="form-control">
												<option value="">Select Sub Category</option>
												
											</select>
											@error('subcategory_id')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
										</div>
									</div>
                                </div>
                            </div>  <!-- 1st row end-->

						
                            <div class="row">   <!-- 2nd row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                    	<h5>SubSubCategory</h5>
                                    	<div class="controls">
											<select name="subsubcategory_id" class="form-control">
												<option value="">Select Sub SubCategory</option>
												
											</select>
											@error('subsubcategory_id')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
										</div>
									</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_en" class="form-control"> 
                                            @error('product_name_en')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Name Hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_hi" class="form-control"> 
                                            @error('product_name_hi')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
                                        </div>
                                    </div>
                                </div>
                                
                            </div>  <!-- 2nd row end-->

                            <div class="row">   <!-- 3rd row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_code"  class="form-control"> 
                                            @error('product_code')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Quantity<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_qty" class="form-control"> 
                                        </div>
                                        @error('product_qty')
                                        	<span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Tags English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control"> 
                                        </div>
                                        @error('product_tags_en')
                                        	<span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>  <!-- 3rd row end-->

                            <div class="row">   <!-- 4th row-->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Tags Hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_hi" value="Lorem,Ipsum,Amet" data-role="tagsinput" class="form-control"> 
                                        </div>
                                        @error('product_tags_hi')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                    <h5>Product Size English<span class="text-danger"></span></h5>

                                        <div class="controls">
                                            <input type="text" name="product_size_en" value="Small,Medium,Large" data-role="tagsinput" class="form-control"> 
                                        </div>
                                        @error('product_size_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <h5>Product Size Hindi<span class="text-danger"></span></h5>

                                        <div class="controls">
                                            <input type="text" name="product_size_hi" value="छोटा,मध्यम,बड़ा
" data-role="tagsinput" class="form-control"> 
                                        </div>
                                        @error('product_size_hi')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>


                            </div>  <!-- 4th row end-->


                            <div class="row">   <!-- 5th row-->


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Colour English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_en" value="Red,Black,White" data-role="tagsinput" class="form-control"> 
                                            @error('product_color_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Colour Hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_hi" value="लाल, काला, सफेद
                                                " data-role="tagsinput" class="form-control"> 
                                            @error('product_color_hi')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                       
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="selling_price" class="form-control"> 
                                            @error('selling_price')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
                                        </div>
                                    </div>   
                                </div>


                            </div>  <!-- 5th row end-->

                            <div class="row"> <!-- 6th row start-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <h5>Product Discount Price<span class="text-danger"></span></h5>

                                        <div class="controls">
                                            <input type="text" name="discount_price" class="form-control"> 
                                            @error('discount_price')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
                                        </div>
                                    </div>   
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Main Thumbnail <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="product_thumbnail"  class="form-control" onChange="mainThumbURL(this)"> 
                                            @error('product_thumbnail')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
                                            <img src="" id="mainThumb">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Multiple Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="multiImg" name="multi_img[]" class="form-control" multiple=""> 
                                            @error('multi_img')
                                        	<span class="text-danger">{{$message}}</span>
                                        	@enderror
                                            <div class="row" id="preview_img"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>  <!-- 6th row end-->


                            <div class="row"> <!-- 7th row start-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Short Description English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_descp_en" id="textarea" class="form-control" ></textarea>

                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Short Description Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_descp_hi" id="textarea" class="form-control" ></textarea>

                                        </div>
                                    </div>  
                                </div>
                            </div>  <!-- 7th row end-->

                         <hr>   
                            <div class="row"> <!-- 8th row start-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Long Description English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
												
						                    </textarea>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Long Description Hindi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor2" name="long_descp_hi" rows="10" cols="80">
												
						                    </textarea>
                                        </div>
                                    </div>  
                                </div>
                            </div>  <!-- 8th row end-->
                        <hr>


                        
                            <div class="row"> <!-- 9th row start-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                <label for="checkbox_2">Hot Deals</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                <label for="checkbox_3">Featured</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                <label for="checkbox_4">Special Offer</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                <label for="checkbox_5">Special Deals</label>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>  <!-- 9th row end-->



                            <div class="col-md-6">

                                <div class="form-group">
                                    <h5>Digital Product <span class="text-danger">pdf,xlx,csv</span></h5>
                                    <div class="controls">
                                        <input type="file" name="file" class="form-control" > 
                                    </div>
                                </div>
                            </div> <!-- end col md 4 -->








							</div>
						</div>
						
						<div class="text-xs-right">
						<input type="submit" class="btn btn-primary mb-5 text-center" value="Add Product">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>


<!-- <script type="text/javascript">
window.onload = function() {
    if (window.jQuery) {  
        // jQuery is loaded  
        alert("Yeah!");
    } else {
        // jQuery is not loaded
        alert("Doesn't Work");
    }
}
</script> -->

<script type="text/javascript">


    $(document).ready(function(){
    
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            //console.log(category_id);
            //alert("hello");
            //alert(category_id);
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/sub/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');

                    


                       var d =$('select[name="subcategory_id"]').empty();
                       $('select[name="subcategory_id"]').append('<option value="">'
							   + "select subcategory" + '</option>');
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'
							   + value.subcategory_name_en + '</option>');
							   //alert("call");
                          });
                    },
                });  //ajax end
            } else {
                alert('danger');
            } //if end
        });


        //subcategory change
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">'
							   + value.sub_subcategory_name_en + '</option>');
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

<script type="text/javascript">
	function mainThumbURL(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThumb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>


<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>
  

@endsection