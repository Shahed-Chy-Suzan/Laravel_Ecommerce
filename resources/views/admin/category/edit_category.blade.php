@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
    	  <h5>Category Update</h5>
    	</div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Category Update</h6>
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

        <form action="{{url('update/category/'.$category->id)}}" method="POST">
            @csrf
            <div class="modal-body pd-20">
                <div class="form-group">
                    {{-- <input type="hidden" name="id" id="{{$category->id)}}"> --}}
                    <label for="catname">Category Name</label>
                    <input type="text" class="form-control" name="category_name" id="catname" value="{{$category->category_name}}">
                </div>
            </div><!-- modal-body -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-info pd-x-20">Update</button>
              <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>

    @endsection