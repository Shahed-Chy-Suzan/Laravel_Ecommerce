@extends('admin.admin_layouts')
@section('admin_content')

    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Database Backup</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Database Backup List
          	<a href="{{ route('admin.backup.now') }}" class="btn btn-sm btn-warning" style="float: right;" >Backup Now</a>
          </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                <th>File Name</th>
                <th>Size</th>
                <th>Path</th>
                <th>Download</th>
                <th>Action</th>
                </tr>
              </thead>
              <tbody>
               	@foreach($files as $row)
              <tr class="odd gradeX">
                <td>{{ $row->getFilename() }}</td>
                <td>{{ $row->getSize() }} Kb</td>
                <td>{{ $row->getpath()}}</td>
                <td class="center"> <a href="{{ url($row->getFilename()) }}"  class="btn btn-sm btn-primary" title="Download"><i class="fa fa-download"></i> </a></td>
                <td class="center"><a href="{{ url('delete/database/'.$row->getFilename() ) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></td>
              </tr>
           @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->

@endsection
