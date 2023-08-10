@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Teacher List</h3>
	<a href="{{ route('teacher.registration.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add New Teacher</a>			  

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Name</th> 
				<th>ID NO</th>
				<th>Mobile</th>
				<th>Gender</th>
				<th>Join Date</th>
				<th>Salary</th>
				@if(Auth::user()->role == "Admin")
				<th>Code</th>
				 @endif
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $teacher )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $teacher->name }}</td>	
				<td> {{ $teacher->id_no }}</td>	
				<td> {{ $teacher->mobile }}</td>	
				<td> {{ $teacher->gender }}</td>	
				<td> {{ $teacher->join_date }}</td>	
				<td> {{ $teacher->salary }}</td>
				@if(Auth::user()->role == "Admin")	
				<td> {{ $teacher->code }}</td>	
				 @endif			 
				<td>
<a href="{{ route('teacher.registration.edit',$teacher->id) }}" class="btn btn-info">Edit</a>
<a target="_blank" href="{{ route('teacher.registration.details',$teacher->id) }}" class="btn btn-danger">Details</a>

				</td>
				 
			</tr>
			@endforeach
							 
						</tbody>
						<tfoot>
							 
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection
