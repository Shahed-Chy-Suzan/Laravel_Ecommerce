@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart_container">
						<div class="cart_title">Your Wishlist</div>
						<div class="cart_items">
							<ul class="cart_list">
							@foreach($product as $row)
								<li class="cart_item clearfix cart_list">
									<div class="cart_item_image"><a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}"><img src="{{ asset( $row->image_one) }}" style="height: 100px;"></a></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $row->product_name }}</div>
										</div>
										@if($row->product_color == NULL)
										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">
													{{ $row->product_color }}
											</div>
										</div>
										@endif
										@if($row->product_size == NULL)
										@else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">
													{{ $row->product_size }}
											</div>
										</div>
										@endif

										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div><br><br>
											<button id="{{ $row->id }}" class="btn btn-sm btn-danger addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add To Cart</button>
                                            <a href="{{url('user/wishlist/remove/'.$row->id)}}" role="button" class="btn btn-sm btn-danger" title="Remove Cart"> X </a>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
    </div>

<!---------------//--------------------------//----------------------------->


    <!--------------product "Cart_add" modal------------------>
<!-- Modal -->
<div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
         <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 16rem;">
                <img src="" class="card-img-top" id="pimage" style="height: 240px;">
                <div class="card-body">

                </div>
              </div>
            </div>
            <div class="col-md-4 ml-auto">
                <ul class="list-group">
                    <li class="list-group-item"> <h4 class="card-title" id="pname"></h4></span></li>
                    <li class="list-group-item">Product code: <span id="pcode"> </span></li>
                    <li class="list-group-item">Category:  <span id="pcat"> </span></li>
                    <li class="list-group-item">SubCategory:  <span id="psubcat"> </span></li>
                    <li class="list-group-item">Brand: <span id="pbrand"> </span></li>
                    <li class="list-group-item">Stock: <span class="badge " style="background: green; color:white;">Available</span></li>
                </ul>
            </div>
            <div class="col-md-4 ">
                <form action="{{ route('insert.into.cart') }}" method="post">
                  @csrf
                  <input type="hidden" name="product_id" id="product_id">
                  <div class="form-group" id="colordiv">
                    <label for="">Color</label>
                    <select name="color" class="form-control">
                    </select>
                  </div>
                   <div class="form-group" id="sizediv" >
                    <label for="exampleInputEmail1">Size</label>
                    <select name="size" class="form-control" id="size">
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quantity</label>
                    <input type="number" class="form-control" value="1" name="qty">
                  </div>
                  <button type="submit" class="btn btn-primary">Add To Cart</button>
                </form>
             </div>
           </div>
        </div>
      </div>
    </div>
  </div>

  <!--modal end-->

<!---Model er JS/ajax code-->
  <script type="text/javascript">
      function productview(id){     //--from add to Cart button//-->(productview(id))
            $.ajax({
                url: "{{  url('/cart/product/view/') }}/"+id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('#pname').text(data.product.product_name);
                    $('#pimage').attr('src',data.product.image_one);
                    $('#pcat').text(data.product.category_name);
                    $('#psubcat').text(data.product.subcategory_name);
                    $('#pbrand').text(data.product.brand_name);
                    $('#pcode').text(data.product.product_code);
                    $('#product_id').val(data.product.id);

                    var d =$('select[name="size"]').empty();
                    $.each(data.size, function(key, value){
                        $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                        if (data.size == "") {
                                $('#sizediv').hide();
                        }else{
                                $('#sizediv').show();
                        }
                    });

                    var d =$('select[name="color"]').empty();
                    $.each(data.color, function(key, value){
                        $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                            if (data.color == "") {
                                $('#colordiv').hide();
                        } else{
                                $('#colordiv').show();
                        }
                    });
               }
        })
      }
  </script>


<script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>

@endsection
