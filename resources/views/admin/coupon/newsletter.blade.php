@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
    	  <h5>Subscriber Table</h5>
    	</div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Subscriber List
            <a href="#" class="btn btn-sm btn-danger" style="float: right;" id="delete" >Delete All</a>
        </h6>
        <br>

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
                <th class="wd-15p">ID</th>
                <th class="wd-15p">Email</th>
                <th class="wd-15p">Subscription Time</th>
                <th class="wd-20p">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($newsletter as $row)
            <tr>
            <td> <input type="checkbox"> {{$row->id}}</td>
            <td>{{ $row->email }}</td>
            <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans() }}</td>
            <td>
                <a href="{{url('delete/newsletter/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div><!-- table-wrapper -->
        </div><!-- card -->

@endsection
