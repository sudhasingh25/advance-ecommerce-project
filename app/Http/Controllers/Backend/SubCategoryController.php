<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;


class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcategory=SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_view',compact('subcategory','categories')); 
    }

    public function SubCategoryStore(Request $request){
        $request->validate([ 
            'subcategory_name_en'=> 'required',
            'subcategory_name_hi'=> 'required',
             'category_id'=> 'required',
        ]);

        
        SubCategory::insert([
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_hi'=>$request->subcategory_name_hi,
            'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hi'=>str_replace(' ','-',$request->subcategory_name_hi),
            'category_id'=>$request->category_id,
        ]);

        
        $notification=array(
            'message'=>'Sub Category Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subcategory=SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit',compact('subcategory','categories')); 
    }

    public function SubCategoryUpdate(Request $request){
        $id=$request->id;
        $request->validate([ 
            'subcategory_name_en'=> 'required',
            'subcategory_name_hi'=> 'required',
             'category_id'=> 'required',
        ]);

        
        $update=SubCategory::findOrFail($id)->update([
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_hi'=>$request->subcategory_name_hi,
            'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_hi'=>str_replace(' ','-',$request->subcategory_name_hi),
            'category_id'=>$request->category_id,
        ]);

        
        $notification=array(
            'message'=>'Sub Category Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        
        $notification=array(
            'message'=>'Sub Category Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    
}
