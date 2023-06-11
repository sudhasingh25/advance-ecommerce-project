<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Subsubcategory;


class SubsubCategoryController extends Controller
{
    //
    public function SubSubCategoryView(){
     
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $sub_subcategory=Subsubcategory::latest()->get();
        return view('backend.subsubcategory.sub_subcategory_view',compact('sub_subcategory','categories'));    
    }

    public function GetSubCategory($catid){
        $subcat=SubCategory::where('category_id',$catid)->orderBy('subcategory_name_en','ASC')->get();
        //print_r(json_encode($subcat));
        return json_encode($subcat);
    }

    public function GetSubSubCategory($sub_catid){
        $subsubcat=Subsubcategory::where('subcategory_id',$sub_catid)->orderBy('sub_subcategory_name_en','ASC')->get();
        //print_r(json_encode($subcat));
        return json_encode($subsubcat);
    }


    

    public function SubSubCategoryStore(Request $request){
        $request->validate([ 
            'sub_subcategory_name_en'=> 'required',
            'sub_subcategory_name_hi'=> 'required',
            'category_id'=> 'required',
            'subcategory_id'=> 'required',
        ]);

        
        Subsubcategory::insert([
            'sub_subcategory_name_en'=>$request->sub_subcategory_name_en,
            'sub_subcategory_name_hi'=>$request->sub_subcategory_name_hi,
            'sub_subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->sub_subcategory_name_en)),
            'sub_subcategory_slug_hi'=>str_replace(' ','-',$request->sub_subcategory_name_hi),
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
        ]);

        
        $notification=array(
            'message'=>'Sub subcategory Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcategories=SubCategory::orderBy('subcategory_name_en','ASC')->get();

        $subsubcategory=Subsubcategory::findOrFail($id);
        return view('backend.subsubcategory.sub_subcategory_edit',compact('subsubcategory','categories','subcategories')); 
    }

    public function SubSubCategoryUpdate(Request $request){
        $id=$request->id;

        $update=Subsubcategory::findOrFail($id)->update([

            'sub_subcategory_name_en'=>$request->sub_subcategory_name_en,
            'sub_subcategory_name_hi'=>$request->sub_subcategory_name_hi,
            'sub_subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->sub_subcategory_name_en)),
            'sub_subcategory_slug_hi'=>str_replace(' ','-',$request->sub_subcategory_name_hi),
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
        ]);

        
        $notification=array(
            'message'=>'Sub subcategory Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    
    public function SubSubCategoryDelete($id){
        SubsubCategory::findOrFail($id)->delete();
        
        $notification=array(
            'message'=>'Sub subCategory Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    
}
