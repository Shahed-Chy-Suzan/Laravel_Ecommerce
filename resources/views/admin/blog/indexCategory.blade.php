@extends('admin.admin_layouts')

@section('admin_content')

  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post Category Name Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post Category Name List <a href="{{route('add.categoryName')}}" class="btn btn-primary pull-right">Add Category</a></h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">id</th>
                  <th class="wd-15p">Category Name English</th>
                  <th class="wd-15p">Category Name Bangla</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categoryName as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->category_name_en }}</td>
                  <td>{{ $row->category_name_bn }}</td>
                  <td>
                  	<a href="{{ URL::to('edit/category/name/'.$row->id) }}" title='Edit' class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                  	<a href="{{ URL::to('delete/category/name/'.$row->id) }}" title='Delete' class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->
  </div>


@endsection
