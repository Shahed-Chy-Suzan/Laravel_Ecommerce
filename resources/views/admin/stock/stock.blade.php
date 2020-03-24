@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Stock Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Stock List </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product ID</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Category </th>
                  <th class="wd-15p">Quantity</th>
                  <th class="wd-15p">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $row)
                <tr>
                  <td>{{ $row->product_code }}</td>
                  <td>{{ $row->product_name }}</td>
                  <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
                  <td>{{ $row->category_name }}</td>
                  <td>{{ $row->product_quantity }}</td>
                  <td>
                  	@if($row->status == 1)
                  	    <span class="badge badge-success">Active</span>
                  	@else
                  	    <span class="badge badge-danger">Inactive</span>
                  	@endif
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
