@extends('admin.admin_layouts')
@section('admin_content')

  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Search report</h5>
        </div><!-- sl-page-title -->

        <div class="row">
        	 <div class="col-lg-4">
        	 	   <div class="card pd-20 pd-sm-40">
			          <div class="table-wrapper">
			            <form method="post" action="{{ route('search.by.date') }}" >
			              @csrf
			              <div class="modal-body pd-20">
			                <div class="form-group">
			                  <label for="exampleInputEmail1">Search By Date</label>
			                  <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date" required="">
			                </div>
			              </div><!-- modal-body -->
			              <div class="modal-footer">
			                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
			              </div>
			            </form>
			          </div><!-- table-wrapper -->
			        </div><!-- card -->
        	 </div>

        	  <div class="col-lg-4">
        	 	    <div class="card pd-20 pd-sm-40">
			          <div class="table-wrapper">
			            <form method="post" action="{{ route('search.by.month') }}" >
			              @csrf
			              <div class="modal-body pd-20">
			                <div class="form-group">
			                  <label for="exampleInputEmail1">Search By Month</label>
			                 <select class="form-control" name="month">
			                 	 <option value="January">January</option>
			                 	 <option value="February">February</option>
			                 	 <option value="March">March</option>
			                 	 <option value="April">April</option>
			                 	 <option value="May">May</option>
			                 	 <option value="June">June</option>
			                 	 <option value="July">July</option>
			                 	 <option value="August">August</option>
			                 	 <option value="September">September</option>
			                 	 <option value="October">October</option>
			                 	 <option value="November">November</option>
			                 	 <option value="December">December</option>
			                 </select>
			                </div>
			              </div><!-- modal-body -->
			              <div class="modal-footer">
			                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
			              </div>
			            </form>
			          </div><!-- table-wrapper -->
			        </div><!-- card -->
        	 </div>

        	  <div class="col-lg-4">
        	 	    <div class="card pd-20 pd-sm-40">
			          <div class="table-wrapper">
			            <form method="post" action="{{ route('search.by.year') }}" enctype="multipart/form-data">
			              @csrf
			              <div class="modal-body pd-20">
			                <div class="form-group">
			                  <label for="exampleInputEmail1">Search By Year</label>
			                   <select class="form-control" name="year">
			                 	 <option value="2018">2018</option>
			                 	 <option value="2019">2019</option>
			                 	 <option value="2020">2020</option>
			                 	 <option value="2021">2021</option>
			                 	 <option value="2022">2022</option>
			                 	 <option value="2023">2023</option>
			                 	 <option value="2024">2024</option>
			                 	 <option value="2025">2025</option>
			                 	 <option value="2026">2026</option>
			                 	 <option value="2027">2027</option>
			                 	 <option value="2028">2028</option>
			                 	 <option value="2029">2029</option>
			                 	  <option value="2030">2030</option>
			                 </select>
			                </div>
			              </div><!-- modal-body -->
			              <div class="modal-footer">
			                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
			              </div>
			            </form>
			          </div><!-- table-wrapper -->
			        </div><!-- card -->
        	 </div>
        </div>

      </div><!-- sl-pagebody -->

@endsection
