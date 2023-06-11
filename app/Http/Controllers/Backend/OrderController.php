<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;



class OrderController extends Controller
{
    // Pending Orders 
    public function PendingOrders(){
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    } // end mehtod
    public function ConfirmedOrders(){
        $orders = Order::where('status','Confirmed')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders'));
    } // end mehtod
    public function DeliveredOrders(){
        $orders = Order::where('status','Delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    } // end mehtod
    public function ProcessingOrders(){
        $orders = Order::where('status','Processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    } // end mehtod
    public function PickedOrders(){
        $orders = Order::where('status','Picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    } // end mehtod
    public function CancelOrders(){
        $orders = Order::where('status','Canceled')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel_orders',compact('orders'));
    } // end mehtod
    public function ShippedOrders(){
        $orders = Order::where('status','Shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    } // end mehtod


    // Pending Order Details 
	public function PendingOrdersDetails($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} // end method
    
    
    //Pending to confirm
    public function PendingToConfirm($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Confirmed']);
        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );
  
        return redirect()->route('pending-orders')->with($notification);
    } // end method

    public function ConfirmToProcessing($order_id){

        Order::findOrFail($order_id)->update(['status' => 'Processing']);
  
        $notification = array(
              'message' => 'Order Processing Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('confirmed-orders')->with($notification);
  
  
      } // end method
  
  
  
          public function ProcessingToPicked($order_id){
  
        Order::findOrFail($order_id)->update(['status' => 'Picked']);
  
        $notification = array(
              'message' => 'Order Picked Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('processing-orders')->with($notification);
  
  
      } // end method
  
  
       public function PickedToShipped($order_id){
  
        Order::findOrFail($order_id)->update(['status' => 'Shipped']);
  
        $notification = array(
              'message' => 'Order Shipped Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('picked-orders')->with($notification);
  
  
      } // end method
  
  
       public function ShippedToDelivered($order_id){
        $product = OrderItem::where('order_id',$order_id)->get();
        foreach ($product as $item) {
            Product::where('id',$item->product_id)
                    ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
        } 
  
        Order::findOrFail($order_id)->update(['status' => 'Delivered']);
  
        $notification = array(
              'message' => 'Order Delivered Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('shipped-orders')->with($notification);
  
  
      } // end method
  
  
       public function DeliveredToCanceled($order_id){
  
        Order::findOrFail($order_id)->update(['status' => 'Canceled']);
  
        $notification = array(
              'message' => 'Order Canceled Successfully',
              'alert-type' => 'success'
          );
  
          return redirect()->route('delivered-orders')->with($notification);
  
  
      } // end method

      public function AdminInvoiceDownload($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

		$pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	} 
    
    // end method 

  
  
}