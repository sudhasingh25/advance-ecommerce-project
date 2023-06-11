<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Subsubcategory;

use App\Models\BlogPost;




class IndexController extends Controller
{
    public function Index(){
        $blogpost = BlogPost::latest()->get();

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $featured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();
        
    	$skip_category_0 = Category::skip(0)->first();
    	$skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
    	
        $skip_category_1 = Category::skip(1)->first();
    	$skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();


        $skip_brand_5 = Brand::skip(5)->first();
    	$skip_product_5 = Product::where('status',1)->where('brand_id',$skip_brand_5->id)->orderBy('id','DESC')->get();


        return view('frontend.index',compact('skip_brand_5','skip_product_5','skip_category_0','skip_product_0','skip_category_1','skip_product_1','special_deals','categories','sliders','products','featured','special_offer','blogpost'));
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;


        if($request->file('profile_photo_path')){
            $file=$request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path']=$filename;
        }
        $data->save();

        $notification=array(
            'message'=>'User Profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('dashboard')->with($notification);        
    }

    public function UserChangePassword(){
        $id=Auth::user()->id;
        $user=User::find($id);

        return view('frontend.profile.change_password',compact('user'));
    }

    
    public function UserStoreChangePassword(Request $request){
        $validateData = $request->validate([
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);
    
        $hashedPassword=Auth::user()->password;

        if(Hash::check($request->old_password,$hashedPassword)){
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            
            return redirect()->route('user.logout');
        }else{
            
        $notification=array(
            'message'=>'password is not changed Successfully',
            'alert-type'=>'success'
        );
            return redirect()->back()->with($notification);
    
        }
    }


    public function ProductDetails($id,$slug){
        $product=Product::findOrFail($id);

        
		$color_en = $product->product_color_en;
		$product_color_en = explode(',', $color_en);

		$color_hi = $product->product_color_hi;
		$product_color_hi = explode(',', $color_hi);

		$size_en = $product->product_size_en;
		$product_size_en = explode(',', $size_en);

		$size_hi = $product->product_size_hi;
		$product_size_hi = explode(',', $size_hi);

        
		$cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        $multiImg=MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('relatedProduct','product','multiImg','product_color_en','product_color_hi','product_size_en','product_size_hi'));
    }

    
	public function TagWiseProduct($tag){
        $categories = Category::orderBy('category_name_en','ASC')->get();
       // print_r($categories);

        $products = Product::where('status',1)->where('product_tags_en',$tag)->orWhere('product_tags_hi',$tag)->orderBy('id','DESC')->paginate(3);
		//print_r($products);
        return view('frontend.tags.tags_view',compact('products','categories'));

	}

     // Subcategory wise data
	public function SubCatWiseProduct(Request $request,$subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_en','ASC')->get();

		$breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();

        ///  Load More Product with Ajax 
        if ($request->ajax()) {
            $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();
        
            $list_view = view('frontend.product.list_view_product',compact('products'))->render();
            return response()->json(['grid_view' => $grid_view,'list_view',$list_view]);	
        
        }
         ///  End Load More Product with Ajax 
 

		return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat'));
	}

	public function SubSubCatWiseProduct($subsubcat_id,$slug){
		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name_en','ASC')->get();
		$breadsubsubcat = Subsubcategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();

		return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat'));
	}

      /// Product View With Ajax
	public function ProductViewAjax($id){
    
        $product = Product::with('category','brand')->findOrFail($id);
		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size
            ));

	} // end method 

    
    // Product Seach 
	public function ProductSearch(Request $request){
        $request->validate(["search" => "required"]);

		$item = $request->search;
		// echo "$item";
        $categories = Category::orderBy('category_name_en','ASC')->get();
		$products = Product::where('product_name_en','LIKE',"%$item%")->get();
		return view('frontend.product.search',compact('products','categories'));
    }

    
    ///// Advance Search Options 
    public function SearchProduct(Request $request){
        
		$request->validate(["search" => "required"]);

		$item = $request->search;		 

		$products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thumbnail','selling_price','id','product_slug_en')->limit(5)->get();
		return view('frontend.product.search_product',compact('products'));
	} // end method 

}
