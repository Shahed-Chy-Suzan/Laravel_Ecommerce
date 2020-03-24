@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
          <div class="sl-page-title">
              <h5>Subcategory Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Subcategory List
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
                    <th class="wd-15p">Category name</th>
                    <th class="wd-15p">Subcategory name</th>
                    <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($subcategory as $row)
                <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->category_name}}</td>
                <td>{{$row->subcategory_name}}</td>
                <td>
                    <a href="{{url('edit/subcategory/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{url('delete/subcategory/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
              <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Subcategory Add</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

    {{----- form ----}}
            <form action="{{route('store.subcategory')}}" method="POST">
            @csrf
            <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="catname">Subcategory Name</label>
                    <input type="text" class="form-control" name="subcategory_name" id="catname" placeholder="Enter Subcategory Name">
                </div>
                <div class="form-group">
                    <label for="catid">Category Name</label>
                    <select name="category_id" id="catid" class="form-control">
                    @foreach ($category as $row)
                        <option value="{{$row->id}}">{{$row->category_name}}</option>
                    @endforeach
                </select>
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
