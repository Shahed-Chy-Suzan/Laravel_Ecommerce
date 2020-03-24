@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
    	  <h5>Brand Table</h5>
    	</div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Brand List
            <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
        </h6>
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

          <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Brand Name</th>
                <th class="wd-15p">Brand Logo</th>
                <th class="wd-20p">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($brand as $row)
            <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->brand_name}}</td>
            <td><img src="{{URL::to($row->brand_logo)}}" height="40px" width="50px"></td>
                <td>
                    <a href="{{url('edit/brand/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{url('delete/brand/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>
</div>


         <!-- LARGE MODAL -->
 <div id="modaldemo3" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

{{----- form ----}}
        <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body pd-20">
            <div class="form-group">
                <label for="catname">Brand Name</label>
                <input type="text" class="form-control" name="brand_name" id="catname" placeholder="Enter Brand Name">
            </div>
            <div class="form-group">
                <label for="catname">Brand Logo</label>
                <input type="file" class="form-control" name="brand_logo" id="catname">
            </div>
        </div><!-- modal-body -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pd-x-20">Submit</button>
          <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->


@endsection
