@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Site Setting Section</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Website Setting  </h6>
          <p class="mg-b-20 mg-sm-b-30"> Website Update</p>
          
          <form action="{{ route('update.sitesetting') }}" method="post" >
          	@csrf
          <input type="hidden" name="id" value="{{ $setting->id }}">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> Phone One: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_one"  required="" value="{{ $setting->phone_one }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone Two: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_two"  required="" value="{{ $setting->phone_two }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  required="" value="{{ $setting->email }}">
                </div>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Name <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_name"  required="" value="{{ $setting->company_name }}">
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Address <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_address"  required="" value="{{ $setting->company_address }}">
                </div>
              </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Facebook Link<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="facebook"  required="" value="{{ $setting->facebook }}">
                </div>
              </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Youtube Link<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="youtube"  required="" value="{{ $setting->youtube }}">
                </div>
              </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Instagram Link<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="instagram"  required="" value="{{ $setting->instagram }}">
                </div>
              </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Twitter Link<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="twitter"  required="" value="{{ $setting->twitter }}">
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->
            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

@endsection
