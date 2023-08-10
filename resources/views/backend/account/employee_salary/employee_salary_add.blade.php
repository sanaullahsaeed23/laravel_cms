@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">

		
<div class="col-12">
<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Add<strong>Employee Salary </strong></h4>
				  </div>

				  <div class="box-body">
				
		 
			<div class="row"> 
 
<div class="col-md-3">

 		<div class="form-group">
		<h5>ID NO <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="employeeID" id="employeeID" class="form-control" > 
	  </div>
		 
	</div>
	  
 			</div> <!-- End Col md 3 --> 

	 





			<div class="col-md-3">

 		<div class="form-group">
		<h5>Month<span class="text-danger">*</span></h5>
		<div class="controls">
		<select name="month" id="month" class="form-control">
        <option value="">Select Month</option>
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>
	  </div>
		 
	</div>
	  
 			</div> 


 			<div class="col-md-6" style="padding-top: 25px;" >

  <a id="search" class="btn btn-primary" name="search"> Search</a>
	  
 			</div> <!-- End Col md 3 --> 		
			</div><!--  end row --> 


 <!--  ////////////////// Mark Entry table /////////////  -->


 <div class="row">
 	<div class="col-md-12">
 		 
<div id="DocumentResults">
 	<script id="document-template" type="text/x-handlebars-template">
  <form action="{{ route('account.salary.store') }}" method="post" >
  	@csrf
 	<table class="table table-bordered table-striped" style="width: 100%">
 	<thead>
 		<tr>
        @{{{thsource}}}
 		</tr>
 	 </thead>
 	 <tbody>
 	 	@{{#each this}}
 	 	<tr>
 	 		@{{{tdsource}}}	
 	 	</tr>
 	 	@{{/each}}
 	 </tbody>
 	</table>

 <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>  
 	
 </form>
    </script>

 
 			
 		</div> 		





 	</div> 	 <!-- // End col md 12 -->
 </div>  <!-- // END Row  -->
 
 
			       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>

 


<script type="text/javascript">
  $(document).on('click','#search',function(){   
    var employeeID = $('#employeeID').val();

     $.ajax({
      url: "{{ route('account.salary.getemployee')}}",
      type: "get",
      data: {'employeeID':employeeID},
      beforeSend: function() {       
      },
      success: function (data) {
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });

</script>
 



@endsection
