@php
 $prefix = Request::route()->getPrefix();
 $route = Route::current()->getName();

 @endphp


 <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Smart</b>Learning</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree"  style="background:linear-gradient(45deg, #0F5EF7, #7a15f7);">  
		  
		<li class="{{ ($route == 'dashboard')?'active':'' }}" >
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span style="color: black;">Dashboard</span>
          </a>
        </li>  
		
    @if(Auth::user()->role == 'Admin')
        <li class="treeview {{ ($prefix == '/users')?'active':'' }} " >
          <a href="#">
            <i data-feather="message-circle"></i>
            <span style="color: black;">Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li style="color: black;"><a  href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
            <li style="color: black;"><a href="{{ route('users.add') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 
        @endif
		  <!-- prfile section -->
        <li class="treeview {{ ($prefix == '/profile')?'active':'' }}">
          <a href="#">
            <i data-feather="grid"></i> <span style="color: black;">Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li style="color: black;"><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
        <li style="color: black;"><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>
            
          </ul>
        </li>
        <!-- NoticeBoard Sectoin -->
        <li class="treeview {{ ($prefix == '/notice')?'active':'' }}">
          <a href="#">
            <i data-feather="grid"></i> <span style="color: black;">NoticeBoard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="{{ route('notice.view') }}"><i class="ti-more"></i>Comms and Notifications</a></li>
            
          </ul>
        </li>

<li class="treeview {{ ($prefix == '/setups')?'active':'' }}">
          <a href="#">
            <i data-feather="credit-card"></i> <span style="color: black;">System Administration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="{{ route('student.class.view') }}" style="color: black;"><i class="ti-more"></i>Student Class</a></li>
        <li><a href="{{ route('teacher.registration.view') }}" style="color: black;"><i class="ti-more"></i>Add Teacher</a></li>
        <li><a href="{{ route('student.registration.view') }}" style="color: black;"><i class="ti-more"></i>Add Student</a></li>

         <li><a href="{{ route('student.year.view') }}" style="color: black;"><i class="ti-more"></i>Student Year</a></li>
         <li><a href="{{ route('student.group.view') }}" style="color: black;"><i class="ti-more"></i>Student Group</a></li>
         <li><a href="{{ route('student.shift.view') }}" style="color: black;"><i class="ti-more"></i>Student Shift</a></li>
         <li><a href="{{ route('fee.category.view') }}" style="color: black;"><i class="ti-more"></i>Fee Category</a></li>
        <li><a href="{{ route('fee.amount.view') }}" style="color: black;"><i class="ti-more"></i>Fee Category Amount</a></li>
         <li><a href="{{ route('exam.type.view') }}" style="color: black;"><i class="ti-more"></i>Exam Type</a></li>
         <li><a href="{{ route('school.subject.view') }}" style="color: black;"><i class="ti-more"></i>School Subject</a></li>
         <li><a href="{{ route('assign.subject.view') }}" style="color: black;"><i class="ti-more"></i>Assign Subject</a></li>
         <li><a href="{{ route('designation.view') }}" style="color: black;"><i class="ti-more"></i>Designation </a></li>
         
            
          </ul>
        </li>


<li class="treeview {{ ($prefix == '/students')?'active':'' }}">
          <a href="#">
             <i data-feather="hard-drive"></i></i> <span style="color: black;">Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li><a href="{{ route('student.registration.view') }}" style="color: black;"><i class="ti-more"></i>Student Registration</a></li>

        <!-- <li><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a></li> -->
        <li><a href="{{ route('registration.fee.view') }}" style="color: black;"><i class="ti-more"></i>Registration Fee </a></li>
         <li><a href="{{ route('monthly.fee.view') }}" style="color: black;"><i class="ti-more"></i>Monthly Fee </a></li>
         <li><a href="{{ route('exam.fee.view') }}" style="color: black;"><i class="ti-more"></i>Exam Fee </a></li>
         
         
            
          </ul>
        </li>

 











 














<li class="treeview {{ ($prefix == '/employees')?'active':'' }}">
          <a href="#">
            <i data-feather="package"></i> <span style="color: black;">Teacher Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li  class="{{ ($route == 'teacher.registration.view')?'active':'' }}"><a href="{{ route('teacher.registration.view') }}" style="color: black;"><i class="ti-more"></i>Teacher Registration</a></li>

         <li  class="{{ ($route == 'teacher.salary.view')?'active':'' }}"><a href="{{ route('teacher.salary.view') }}"style="color: black;"><i class="ti-more"></i>Teacher Salary</a></li>

         <li><a href="{{ route('teacher.leave.view') }}" style="color: black;"><i class="ti-more"></i>Teacher Leave</a></li>
         <li><a href="{{ route('employee.attendance.view') }}" style="color: black;"><i class="ti-more"></i>Teacher Attendance</a></li>
        <li><a href="{{ route('employee.monthly.salary') }}" style="color: black;"><i class="ti-more"></i>Teacher Monthly Salary</a></li>
 
            
          </ul>
        </li>



<!-- <li class="treeview {{ ($prefix == '/marks')?'active':'' }}">
          <a href="#">
             <i data-feather="edit-2"></i> <span> Marks Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'marks.entry.add')?'active':'' }}"><a href="{{ route('marks.entry.add') }}"><i class="ti-more"></i>Marks Entry</a></li> 
      <li class="{{ ($route == 'marks.entry.edit')?'active':'' }}"><a href="{{ route('marks.entry.edit') }}"><i class="ti-more"></i>Marks Edit</a></li>

       <li class="{{ ($route == 'marks.entry.grade')?'active':'' }}"><a href="{{ route('marks.entry.grade') }}"><i class="ti-more"></i>Marks Grade</a></li> 

            
          </ul>
        </li>

 -->



<li class="treeview {{ ($prefix == '/accounts')?'active':'' }}">
          <a href="#">
            <i data-feather="inbox"></i> <span style="color: black;"> Accounts Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'student.fee.view')?'active':'' }}"><a href="{{ route('student.fee.view') }}" style="color: black;"><i class="ti-more"></i>Student Fee</a></li> 
        <li class="{{ ($route == 'account.salary.view')?'active':'' }}"><a href="{{ route('account.salary.view') }}" style="color: black;"><i class="ti-more"></i>Teacher Salary</a></li> 

        <li class="{{ ($route == 'other.cost.view')?'active':'' }}"><a href="{{ route('other.cost.view') }}" style="color: black;"><i class="ti-more"></i>Other Cost</a></li>

            
          </ul>
        </li>

		
        
		 
        <li class="header nav-small-cap">Report Interface</li>
		  
       <li class="treeview {{ ($prefix == '/reports')?'active':'' }}">
          <a href="#">
            <i data-feather="server"></i></i> <span style="color: black;"> Reports Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
        <li class="{{ ($route == 'monthly.profit.view')?'active':'' }}"><a href="{{ route('monthly.profit.view') }}"><i class="ti-more"></i>Monthly-Yearly Profite</a></li> 

          <li class="{{ ($route == 'marksheet.generate.view')?'active':'' }}"><a href="{{ route('marksheet.generate.view') }}"><i class="ti-more"></i>MarkSheet Generate</a></li>

           <li class="{{ ($route == 'attendance.report.view')?'active':'' }}"><a href="{{ route('attendance.report.view') }}"><i class="ti-more"></i>Attendance Report</a></li>

           <li class="{{ ($route == 'student.result.view')?'active':'' }}"><a href="{{ route('student.result.view') }}"><i class="ti-more"></i>Student Result </a></li>

           <li class="{{ ($route == 'student.idcard.view')?'active':'' }}"><a href="{{ route('student.idcard.view') }}"><i class="ti-more"></i>Student ID Card </a></li>    

             
        

            
          </ul>
        </li>
		
		 
		  
		 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>

  