@extends('backend.layout.master')
<!-- view all categories code start here -->
@section('content')

{{--dd($categories)--}}
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Categories
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Categories</th>
                                    <th>status</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
							@foreach($categories as $key => $val)

                                <tr>
                                    <td><a href="#">{{ $val->category_name}}</a></td>
                                    <td>
										@if($val->in_active == 0)
											<small class="label label-success">{{ 'Active' }}</small>
										@else
											<small class="label label-success">{{ 'In-active' }}</small>
										@endif
									</td>
                                    <td>
										<a href="{{ url('admin/editcategories/'.$val->category_id)}}"><i class="fa fa-edit"></i></a>
										<a href="#"><i class="fa fa-trash-o"></i></a>
										
									</td>
                                    
                                </tr>
                                
                            @endforeach   
                                
                                </tfoot>
                            </table>
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

 <!-- load data table script -->
 <script>
     $(function () {
         $('#example1').DataTable({
             "paging": true,
             "lengthChange": true,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": true
         });
     });
 </script>
@endsection
<!-- view all categories code end here -->