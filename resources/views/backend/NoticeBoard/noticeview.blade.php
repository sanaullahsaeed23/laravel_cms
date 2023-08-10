@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Student NoticeBoard</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{route('notice.store')}}" enctype="multipart/form-data">
	 	@csrf
					  <div class="row">
						<div class="col-12">	
 

 

		<div class="form-group">
		<h5>Title<span class="text-danger">*</span></h5>
		<div class="controls">
		<input type="text" name="title" class="form-control" > 


	 @error('name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>
	<div class="form-group">
		<h5>Description<span class="text-danger">*</span></h5>
		<div class="controls">
		<textarea name="description" class="form-control"></textarea>

	 @error('name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>
 
	<div class="form-group">
		<h5>Attachment<span class="text-danger">*</span></h5>
		<div class="controls">
		<input type="file" name="image" class="form-control" id="image" >    

	 @error('name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>

	<div class="form-group">
		<h5>Notice From<span class="text-danger">*</span></h5>
		<div class="controls">
		<input type="text" name="noticefrom" class="form-control">  

	 @error('name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
		 
	</div>
	 <!--  -->
<div class="row">

<div class="col-md-3">

<div class="form-group">
<h5>Student<span class="text-danger">*</span></h5>
<div class="controls">
<input type="checkbox" name="student" class="form-check-input" id="student-checkbox">
    <label for="student-checkbox">Student</label>

 

</div>
 </div> <!-- // end form group -->
</div> <!-- End col-md-5 -->
<div class="col-md-3">

<div class="form-group">
  <h5>Teacher<span class="text-danger">*</span></h5>
  <div class="controls">
    <input type="checkbox" name="teacher" class="form-check-input" id="teacher-checkbox">
    <label for="teacher-checkbox">Teacher</label>
  </div>
</div>

 
 
</div> <!-- End col-md-5 -->
</div>
	  
  
							 
						<div class="text-xs-right">
	 <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>


 
 
	  
	  </div>
  </div>





@endsection
