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
                        <h4>Header</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href=""> Header</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if (Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div id="del_blog" style="display: none" class="alert alert-danger"><b>Deleted!</b>
                        Successfully!
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row tab-content">


                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Header List </h4>
                                    <a href="{{ route('admin.headercreate') }}" class="btn btn-primary">+ Add new</a>
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
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($headers))
                                                    @foreach ($headers as $key => $header)
                                                        <tr id="res_{{ $header->id }}">
                                                            <td><strong>{{ $key + 1 }}</strong></td>
                                                            <td>{{ $header->name }}</i> </td>
                                                            <td>
                                                                <a href="{{ route('admin.subheader', $header->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="la la-plus"></i>
                                                                </a>

                                                                <a href="{{ route('admin.headeredit', $header->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="la la-pencil"></i>
                                                                </a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="delete_header({{ $header->id }})">
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



                     
            
                            <div class="col-lg-12">
                                <div class="row tab-content">
            
                                  
            
                                    <div class="col-xl-4 col-xxl-4 col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Update Section 1 </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <a href="{{ route('admin.section1edit',1) }}" class="btn btn-primary"> <i
                                                                class="la la-pencil"></i> Update</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-xxl-4 col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Update Section 2 </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <a href="{{ route('admin.section2edit',1) }}" class="btn btn-primary"> <i
                                                                class="la la-pencil"></i> Update</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-xxl-4 col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Update Section 3 </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <a href="{{ route('admin.section3edit',1) }}" class="btn btn-primary"> <i
                                                                class="la la-pencil"></i> Update</a>
                                                    </div>
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
                    function delete_header(id) {
                        let _token = $('meta[name="csrf-token"]').attr('content');
                        if (confirm('Are you sure ?')) {
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('admin.headerdelete') }}",
                                data: {
                                    _token: _token,
                                    id: id,
                                },
                                success: function(data) {
                                    $("#res_" + id).slideUp(200);
                                    $('#del_header').hide(0);
                                    $('#del_header').slideDown(200);
                                }
                            });
                        }

                    }
                </script>
            @endsection
