@extends('admin.admin_layouts')

@section('admin_content')

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-tagsinput.css')}}">

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="#">Starlight</a>
      <span class="breadcrumb-item active">Product Section</span>
    </nav>
    <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">New Product Add <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">All Product</a></h6>
        <p class="mg-b-20 mg-sm-b-30">New product add form</p>

<!------ Form Starts --------->
        <form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
            @csrf

        <div class="form-layout">
          <div class="row mg-b-25">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_name"  >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_code"  >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="product_quantity"  >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                  <option> Choose Category </option>

                  @foreach($category as $row)
                  <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                  @endforeach

                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                <select class="form-control select2" name="subcategory_id">


                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group mg-b-10-force">
                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                <select class="form-control select2" data-placeholder="Choose brand" name="brand_id">
                  <option>Choose Brand here</option>
                  @foreach($brand as $br)
                  <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                  @endforeach
                </select>
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput">
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                <input class="form-control lg-4" type="text" name="product_color" data-role="tagsinput" id="color" >
              </div>
            </div><!-- col-4 -->
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="selling_price"  placeholder="Selling Price">
              </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
                <div class="form-group">
                <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                 <textarea class="form-control" id="summernote" name="product_details">

                 </textarea>
              </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                <label class="form-control-label">Video Link<span class="tx-danger">*</span></label>
                 <input class="form-control" placeholder="video link" name="video_link">
              </div>
            </div>

            <div class="col-lg-4">
                <label>Image One (Main Thumbnail)<span class="tx-danger">*</span></label>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required="" accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="one" >
              </label>
            </div>
            <div class="col-lg-4">
                <label>Image Two <span class="tx-danger">*</span></label>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL1(this);" required="" accept="image">
                <span class="custom-file-control"></span>
                <img src="#" id="two" >
              </label>
            </div>
            <div class="col-lg-4">
                <label>Image Three <span class="tx-danger">*</span></label>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL2(this);" required="" accept="/image">
                <span class="custom-file-control"></span>
                <img src="#" id="three" >
              </label>
            </div>
          </div><!-- row -->
          <br><hr>
          <div class="row">
              <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1">
                    <span>Main Slider</span>
                  </label>
              </div>
              <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_deal" value="1">
                    <span>Hot Deal</span>
                  </label>
              </div>
              <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="best_rated" value="1">
                    <span>Best Rated</span>
                  </label>
              </div>
              <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="trend" value="1">
                    <span>Trend Product</span>
                  </label>
              </div>
              <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="mid_slider" value="1">
                    <span>Mid Slider</span>
                  </label>
              </div>
              <div class="col-lg-4">
                  <label class="ckbox">
                    <input type="checkbox" name="hot_new" value="1">
                    <span>Hot New</span>
                  </label>
              </div>

          <div class="col-lg-4">
            <label class="ckbox">
              <input type="checkbox" name="buyone_getone" value="1">
              <span>Buy One Get One</span>
            </label>
          </div>
        </div>

          <br><br><hr>
          <div class="form-layout-footer">
            <button class="btn btn-info mg-r-5" type="submit">Submit </button>
          </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
        </form>
      </div><!-- card -->

    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->


        <!-------------jQuery file/cdn------------------>
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script> --}}
<script src="{{ asset('public/backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap-tagsinput.min.js') }}"></script>


<!--------JQ for getting "subcategory" after "category"--------->
<script type="text/javascript">
    $(document).ready(function() {
       $('select[name="category_id"]').on('change', function(){
           var category_id = $(this).val();
           if(category_id) {
               $.ajax({
                   url: "{{  url('/get/subcategory/') }}/"+category_id,
                   type:"GET",
                   dataType:"json",
                   success:function(data) {
                      var d =$('select[name="subcategory_id"]').empty();
                         $.each(data, function(key, value){

                             $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                         });
                   },
               });
           } else {
               alert('danger');
           }
       });
   });
</script>


<!--------JQ for image--------->
<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
	function readURL1(input) {                  //------------
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')                         //------------
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
	function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>


@endsection

