<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- dummy -->
     <!-- Favicon -->
     <link href="{{ asset('img/favicon.ico') }}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('backend/lib2/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/lib2/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('backend/css2/bootstrap.min.css') }}" rel="stylesheet">

 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('backend/js/pages/vendors.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/charts_chartst.js') }}"></script>
    <script src="{{ asset('backend/js/pages/charts_charts2.js') }}"></script>
    <script src="{{ asset('backend/js/pages/widget-morris-charts') }}"></script>


    <script src="{{ asset('backend/js/pages/charts_charts3.js') }}"></script>

    <script src="{{ asset('backend/icons/feather-icons/feather.min.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
	<script src="{{ asset('backend/js/widget-charts2.js') }}"></script>
	<script src="{{ asset('backend/js/calendar.js') }}"></script>
	<script src="{{ asset('backend/js/pages/widget-charts2.js') }}"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{ asset('backend/js/template.js') }}"></script>
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <title>Smart learning System - Dashboard</title>
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
  <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">
 

<script src="{{ asset('backend/lib2/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  
   
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  @include('admin.body.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('admin')
  <!-- /.content-wrapper -->

 @include('admin.body.footer')

  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	  
	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	

<script src="{{asset('../assets/vendor_components/datatable/datatables.min.js')}}"></script>
  <script src="{{asset('backend/js/pages/data-table.js')}}"></script>


	<!-- Sunny Admin App -->
	<script src="{{ asset('backend/js/template.js') }}"></script>
	<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>
	

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
  $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });


</script> 


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

<script src="{{ asset('backend/js/pages/vendors.min.js') }}"></script>
    <script src="{{ asset('backend/icons/feather-icons/feather.min.js') }}"></script>

	<script src="{{ asset('backend/js/widget-charts2.js') }}"></script>
	<script src="{{ asset('backend/js/pages/widget-charts2.js') }}"></script>
  

	
	<!-- Sunny Admin App -->
	<script src="js/template.js"></script>
  <!--  -->
<!-- JavaScript Libraries -->
<script src="{{ asset('backend/js2/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('backend/js2/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/chart/chart.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/easing/easing.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('backend/js2/main.js') }}"></script>	
</body>
</html>
