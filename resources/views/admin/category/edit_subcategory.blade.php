@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
    <div class="sl-pagebody">
      <div class="sl-page-title">
    	  <h5>Subcategory Update</h5>
    	</div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Subcategory Update</h6>
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

        <form action="{{url('update/subcategory/'.$subcategory->id)}}" method="POST">
            @csrf
            <div class="modal-body pd-20">
                <div class="form-group">
                    <label for="catname">Subcategory Name</label>
                    <input type="text" class="form-control" name="subcategory_name" id="catname" value="{{$subcategory->subcategory_name}}">
                </div>
                <div class="form-group">
                    <label for="catid">Category Name</label>
                    <select name="category_id" id="catid" class="form-control">
                    @foreach ($category as $row)
                        <option value="{{$row->id}}" <?php if($row->id == $subcategory->category_id) {
                            echo "selected";
                        } ?> >{{$row->category_name}}</option>
                    @endforeach
                </select>
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
