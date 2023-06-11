<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipState;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;

use Carbon\Carbon;


class ShippingAreaController extends Controller
{
    //-----------------------state---------------------------------------------
    public function StateView(){
        $states=ShipState::orderBy('state_name','ASC')->get();
        return view('backend.ship.state.view_state',compact('states'));
    }

    public function StateStore(Request $request){
        $request->validate([
    		'state_name' => 'required',
    	]);
        ShipState::insert([
		'state_name' => $request->state_name,
		'created_at' => Carbon::now(),
        ]);

        $notification = array(
			'message' => 'State Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function StateEdit($id){
        $states=ShipState::findOrFail($id);
        return view('backend.ship.state.edit_state',compact('states'));

    }

    public function StateUpdate(Request $request,$id){
        $request->validate([
    		'state_name' => 'required',
    	]);
        //$state_id=$request->id;
        $updated=ShipState::findOrFail($id)->update([
		'state_name' => $request->state_name,
		'updated_at' => Carbon::now(),
        ]);

        $notification = array(
			'message' => 'State Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('manage-state')->with($notification);
    }

    public function StateDelete($id){
        ShipState::findOrFail($id)->delete();
        $notification = array(
			'message' => 'State Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('manage-state')->with($notification);
    }


    //-----------------------district---------------------------------------------

    public function DistrictView(){
        $states=ShipState::orderBy('state_name','ASC')->get();
        $district=ShipDistrict::orderBy('district_name','ASC')->get();
        return view('backend.ship.district.view_district',compact('states','district'));        
    }

    public function DistrictStore(Request $request){
        $request->validate([
            'state_id' => 'required',
            'district_name'=>'required',
        ]);
        ShipDistrict::insert([
        'state_id' => $request->state_id,
        'district_name'=>$request->district_name,
        'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DistrictEdit($id){
       $states=ShipState::orderBy('state_name','ASC')->get();
       //$district=ShipDistrict::where('id',$id)->get();
       $district=ShipDistrict::findOrFail($id);

        //print_r($states);

        return view('backend.ship.district.edit_district',compact('district'));   
    }

    public function DistrictUpdate(Request $request,$id){
        $request->validate([
            'state_id' => 'required',
            'district_name'=>'required',
        ]);
        ShipDistrict::findOrFail($id)->update([
        'state_id' => $request->state_id,
        'district_name'=>$request->district_name,
        'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-district')->with($notification);
    }

    public function DistrictDelete($id){
        ShipDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-district')->with($notification);
    }

    ////////////////////////division /////
    public function DivisionView(){
        $states=ShipState::orderBy('state_name','ASC')->get();
        $district=ShipDistrict::orderBy('district_name','ASC')->get();
        $division=ShipDivision::orderBy('division_name','ASC')->get();
        return view('backend.ship.division.view_division',compact('states','district','division'));       
    }


    public function GetDistrict($state_id){
        $dist=ShipDistrict::where('state_id',$state_id)->orderBy('district_name','ASC')->get();
        //print_r(json_encode($subcat));
        return json_encode($dist);
    }

    public function GetDivision($district_id){
        $div=ShipDivision::where('district_id',$district_id)->orderBy('division_name','ASC')->get();
        //print_r(json_encode($subcat));
        return json_encode($div);
    }

    



    public function DivisionStore(Request $request){
        $request->validate([
            'state_id'=>'required',
            'district_id'=>'required',
            'division_name'=>'required',            
        ]);

        ShipDivision::insert([
            'state_id'=>$request->state_id,
            'district_id'=>$request->district_id,
            'division_name'=>$request->division_name,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function DivisionEdit($id){
        $states=ShipState::orderBy('state_name','ASC')->get();
        $district=ShipDistrict::orderBy('district_name','ASC')->get();
        $division=ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('states','district','division'));
    }

    public function DivisionUpdate(Request $request,$id){
        $request->validate([
            'state_id'=>'required',
            'district_id'=>'required',
            'division_name'=>'required',            
        ]);

        ShipDivision::findOrFail($id)->update([
            'state_id'=>$request->state_id,
            'district_id'=>$request->district_id,
            'division_name'=>$request->division_name,
            'updated_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-division')->with($notification);
    }

    public function DivisionDelete($id){
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-division')->with($notification);
    }

}
