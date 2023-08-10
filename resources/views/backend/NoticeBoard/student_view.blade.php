@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
	<div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
			<div class="row">

				<div class="col-12">
					<div class="box bb-3 border-warning">
						<div class="box-header">
							<h4 class="box-title">Student <strong>Search</strong></h4>
						</div>

						<div class="box-body">
						<form method="GET" action="{{ route('notice_board.search') }}">

<div class="form-group">
	<label for="user_type">User Type:</label>
	<select name="user_type" id="user_type" class="form-control">
		<option value="student">Student</option>
		<option value="teacher">Teacher</option>
	</select>
</div>

<div class="form-group">
	<input type="submit" class="btn btn-primary" value="Search">
</div>

</form>

							 
						</div>
					</div>
				</div> <!-- // end first col 12 -->



				<div class="col-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Notices List</h3>
							<a href="{{ route('notice.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Notification </a>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">

								@if(empty($search))
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">SL</th>
											<th>ID</th>
											<th>Title<l/th>
											<th>Description</th>
											<th>Notice_From</th>
											<th>Image</th>
											<th width="25%">Action</th>

										</tr>
									</thead>
									<tbody>
									@foreach($student_notice as $key => $value )
										<tr>
											<td>{{ $key+1 }}</td>
											<td> {{ $value['id'] }}</td>
											<td> {{ $value['title'] }}</td>
											<td> {{ $value->description }} </td>
											<td> {{ $value['notice_from'] }}</td>
											<td>
  <img src="{{ (!empty($value->image))? url('upload/student_attachments/'.$value->image) : url('upload/no_image.jpg') }}" style="width: 60px; height: 60px;">
</td>

											<td>

											</td>

										</tr>
										@endforeach

									</tbody>
									<tfoot>

									</tfoot>
								</table>

								@else

								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">SL</th>
											<th>ID</th>
											<th>Title</th>
											<th>Description</th>
											<th>Notice_From</th>
											<th>Image</th>
											 
											 
											<th width="25%">Action</th>

										</tr>
									</thead>
									<tbody>
										@foreach($student_notice as $key => $value )
										<tr>
											<td>{{ $key+1 }}</td>
											<td> {{ $value['id'] }}</td>
											<td> {{ $value['title'] }}</td>
											<td> {{ $value->description }} </td>
											<td> {{ $value['notice_from'] }}</td>
											<td> {{ $value['image'] }}</td>
											<td>
												<img src="{{ (!empty($value['image']))? url('upload/student_images/'.$value['image']):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;">
											</td>
											<td> {{ $value->year_id }}</td>
											<td>
												<a title="Edit" href="{{ route('student.registration.edit',$value->rollNumber) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>

												<a title="Promotion" href="{{ route('student.registration.promotion',$value->student_id) }}" class="btn btn-primary"><i class="fa fa-check"></i></a>

												<a target="_blank" title="Details" href="{{ route('student.registration.details',$value->student_id) }}" class="btn btn-danger"><i class="fa fa-eye"></i></a>

											</td>

										</tr>
										@endforeach

									</tbody>
									<tfoot>

									</tfoot>
								</table>


								@endif



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