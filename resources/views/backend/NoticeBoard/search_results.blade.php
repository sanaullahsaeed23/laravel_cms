@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">

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
                        @foreach($notices as $key => $value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->notice_from }}</td>
                            <td>
                                @if ($user_type === 'student')
                                <img src="{{ (!empty($value->image))? url('upload/student_attachments/'.$value->image) : url('upload/no_image.jpg') }}"
                                    style="width: 60px; height: 60px;">
                                @elseif ($user_type === 'teacher')
                                <img src="{{ (!empty($value->image))? url('upload/teacher_attachments/'.$value->image) : url('upload/no_image.jpg') }}"
                                    style="width: 60px; height: 60px;">
                                @endif
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