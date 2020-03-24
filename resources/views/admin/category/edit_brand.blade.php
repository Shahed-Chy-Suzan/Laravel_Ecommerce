@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
    	  <h5>Brand Update</h5>
    	</div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand Update</h6>
        <br>
        <div class="table-wrapper">
{{-- validation error --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
{{--End validation error --}}

        <form action="{{url('update/brand/'.$brand->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body pd-20">
                <div class="form-group">
                    {{-- <input type="hidden" name="id" id="{{$brand->id)}}"> --}}
                    <label for="catname">Brand Name</label>
                    <input type="text" class="form-control" name="brand_name" id="catname" value="{{$brand->brand_name}}">
                </div>
                <div class="form-group">
                    <label for="catname">Brand Logo</label>
                    <input type="file" class="form-control" name="brand_logo" id="catname">
                </div>
                <div class="form-group">
                    <label for="catname">Old Logo</label>
                    <img src="{{URL::to($brand->brand_logo)}}" style="height:40px; width=50px;">
                    <input type="hidden" name="old_logo" value="{{ $brand->brand_logo }}">
                </div>
            </div><!-- modal-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-info pd-x-20">Update</button>
            </div>
            </form>
        </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>

    @endsection