@extends('layouts.app')
@section('content')

<hr>
    <div class="container row">
    <div class="col-lg-12 offset-lg-1">
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">

          <p class="mg-b-20 mg-sm-b-30">Order Details</p>

         <div class="row">
         	<div class="col-md-6">
         	    <div class="card">
         	        <div class="card-header"><strong>Order</strong> Details</div>

         	        <div class="card-body">
         	    	<table class="table table-hover">
         	    		 <tr>
         	    		 	<th>Name : </th>
         	    		 	<th>{{ $order->name }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th>Phone : </th>
         	    		 	<th>{{ $order->phone }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th>Payment : </th>
         	    		 	<th>{{ $order->payment_type }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th>Payment ID : </th>
         	    		 	<th>{{ $order->payment_id }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th>Total :</th>
         	    		 	<th>{{ $order->total }} $</th>
         	    		 </tr>
         	    		  <tr>
         	    		 	<th>Month : </th>
         	    		 	<th>{{ $order->month }}</th>
         	    		 </tr>
         	    		  <tr>
         	    		 	<th>Date : </th>
         	    		 	<th>{{ $order->date }}</th>
         	    		 </tr>
         	    	</table>

         	        </div>
         	    </div>
             </div>

         	<div class="col-md-6">
         	    <div class="card">
         	        <div class="card-header"><strong>Shipping</strong> Details</div>
         	        <div class="card-body">
         	    	<table class="table table-hover">
         	    		 <tr>
         	    		 	<th>Name : </th>
         	    		 	<th>{{ $shipping->ship_name }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th>Phone : </th>
         	    		 	<th>{{ $shipping->ship_phone }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th>Email : </th>
         	    		 	<th>{{ $shipping->ship_email }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th>Address : </th>
         	    		 	<th>{{ $shipping->ship_address }}</th>
         	    		 </tr>
         	    		 <tr>
         	    		 	<th>City :</th>
         	    		 	<th>{{ $shipping->ship_city }}</th>
         	    		 </tr>
         	    		  <tr>
         	    		 	<th>Status : </th>
         	    		 	<th>
                                @if($order->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                @elseif($order->status == 1)
                                    <span class="badge badge-info">Payment Accept</span>
                                @elseif($order->status == 2)
                                    <span class="badge badge-info">Progress </span>
                                @elseif($order->status == 3)
                                    <span class="badge badge-success">Delivered </span>
                                @else
                                    <span class="badge badge-danger">Cancel </span>
                                @endif
         	    		 	</th>
         	    		 </tr>

         	    	</table>

         	        </div>
         	    </div>
         	</div>
         </div>

         <div class="row p-4">
         	<div class="card pd-20 pd-sm-40 col-lg-12">
         	  <h6 class="card-header">Product Details </h6>
         	  <br>
         	  <div class="table-wrapper">
         	    <table  class="table display responsive nowrap table-hover">
         	      <thead>
         	        <tr>
         	          <th class="wd-15p">Product ID</th>
         	          <th class="wd-15p">Product Name</th>
         	          <th class="wd-15p">Image</th>
         	          <th class="wd-15p">Color </th>
         	          <th class="wd-15p">Size</th>
         	          <th class="wd-15p">Quantity</th>
         	          <th class="wd-15p">Unit Price</th>
         	          <th class="wd-20p">Total</th>
         	        </tr>
         	      </thead>
         	      <tbody>
         	        @foreach($details as $row)
         	        <tr>
         	          <td>{{ $row->product_code }}</td>
         	          <td>{{ $row->product_name }}</td>
         	          <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
         	          <td>{{ $row->color }}</td>
         	          <td>{{ $row->size }}</td>
         	          <td>{{ $row->quantity }}</td>
         	          <td>{{ $row->singleprice }} $ </td>
         	          <td>{{ $row->totalprice }} $ </td>
         	        </tr>
         	        @endforeach
         	      </tbody>
         	    </table>
         	  </div><!-- table-wrapper -->
         	</div><!-- card -->
         </div> <br>


        @if($order->status == 0)
            <h3 class="card text-center text-light bg-info">This order is on pending</h3>
        @elseif($order->status == 1)
            <h3 class="card text-center text-light bg-info"> Your Payment have already done and now in delivery process</h3>
        @elseif($order->status == 2)
            <h3 class="card text-center text-light bg-info"> Payment have already done of your product and handover successfully</h3>
        @elseif($order->status == 4)
            <h3 class="card text-center text-light bg-info">This order is not valid,So its cancelled</h3>
        @else
            <h3 class="card text-center text-light bg-info">This product is successfully delivered</h3>
        @endif

      </div>
    </div>
    </div>
</div>
</div> <br><hr>

@endsection
