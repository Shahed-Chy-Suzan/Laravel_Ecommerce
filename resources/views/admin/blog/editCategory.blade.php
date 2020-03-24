@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Blog Section</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Post Category Edit </h6>
          <p class="mg-b-20 mg-sm-b-30">New Post Category Edit form</p>

          <form action="{{ url('update/categoryName/'.$post_category->id) }}" method="post">
          	@csrf

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Category Name (ENGLISH ): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="category_name_en" value="{{$post_category->category_name_en}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Category Name (BANGLA ): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="category_name_bn" value="{{$post_category->category_name_bn}}">
                </div>
              </div><!-- col-4 -->

            <br><br><hr>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->





@endsection
