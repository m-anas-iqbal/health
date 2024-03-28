@extends('layout.master')
@section('doctors')
    active
@endsection
@section('content')
    <!--**********************************
                                                                Content body start
                                                            ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Testimonials</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Testimonials</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if (Session::has('message'))
                            <?php $alert_class =  Session::get('alert-class');  ?>
                            <div class="alert {{ $alert_class }}">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        
                    <div id="del_testimonial" style="display: none" class="alert alert-danger"><b>Deleted!</b>
                        Successfully!
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All testimonial List </h4>
                                    <a href="{{ route('admin.testimonialcreate') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3"
                                            class="display table align-items-center table-flush table-hover roles"
                                            style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                 
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Show on Home Page</th>
                                                  
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($testimonials))
                                                    @foreach ($testimonials as $key => $testimonial)
                                                        <tr id="res_{{ $testimonial->id }}">
                                                            <td><strong>{{ $key + 1 }}</strong></td>
                                                            <td>{{ $testimonial->name }}</td>
                                                            <td>{{ $testimonial->status }}</td>
                                                            <td>{{ $testimonial->show_on_hp }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.testimonialview' , $testimonial->id) }}"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="la la-eye"></i>
                                                                </a>
                                                                <a href="{{ route('admin.testimonialedit' , $testimonial->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="la la-pencil"></i>
                                                                </a>
                                                              
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="delete_testimonial({{ $testimonial->id }})">
                                                                    <i class="la la-trash-o"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


@section('js')
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.roles').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
    <script>
        function delete_testimonial(id) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Are you sure ?')) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.testimonialdelete') }}",
                    data: {
                        _token: _token,
                        id: id,
                    },
                    success: function(data) {
                        $("#res_" + id).slideUp(200);
                        $('#del_testimonial').hide(0);
                        $('#del_testimonial').slideDown(200);
                    }
                });
            }

        }
    </script>
@endsection
