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
                        <h4>All Labority</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Labority</a></li>
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

                    <div id="del_Labority" style="display: none" class="alert alert-danger"><b>Deleted!</b>
                        Successfully!
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Labority List </h4>
                                    <a href="{{ route('admin.laboritycreate') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3"
                                            class="display table align-items-center table-flush table-hover roles"
                                            style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Labority Name</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($laboritys))
                                                    @foreach ($laboritys as $key => $labority)
                                                        <tr id="res_{{ $labority->id }}">
                                                            <td><strong>{{ $key + 1 }}</strong></td>
                                                            <td>{{ $labority->labority_fullname }}</td>
                                                            <td>{{ $labority->email }}</td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="labority_status"
                                                                        name="labority_status"
                                                                        onchange="labority_status({{ $labority->id }})">
                                                                        <option disabled selected>Status</option>
                                                                        <option value="Active"
                                                                            {{ $labority->labority_status == 'Active' ? 'selected' : '' }}>
                                                                            Active</option>
                                                                        <option value="Inactive"
                                                                            {{ $labority->labority_status == 'Inactive' ? 'selected' : '' }}>
                                                                            Inactive</option>
                                                                        <option value="Pending"
                                                                            {{ $labority->labority_status == 'Pending' ? 'selected' : '' }}>
                                                                            Pending</option>
                                                                        <option value="Block"
                                                                            {{ $labority->labority_status == 'Block' ? 'selected' : '' }}>
                                                                            Block</option>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.laborityprofile' , $labority->id) }}"
                                                                    class="btn btn-sm btn-warning">
                                                                    <i class="la la-eye"></i>
                                                                </a>
                                                                <a href="{{ route('admin.laborityedit' , $labority->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="la la-pencil"></i>
                                                                </a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="delete_labority({{ $labority->id }})">
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
        function delete_labority(id) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Are you sure ?')) {
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.laboritydelete') }}",
                    data: {
                        _token: _token,
                        id: id,
                    },
                    success: function(data) {
                        $("#res_" + id).slideUp(200);
                        $('#del_labority').hide(0);
                        $('#del_labority').slideDown(200);
                    }
                });
            }

        }

        function labority_status(id) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            let labority_status = $("#labority_status").val();

    
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.laboritystatus') }}",
                data: {
                    _token: _token,
                    id: id,
                    labority_status: labority_status,
                },
                success: function(data) {

                }
            });
        }
    </script>
@endsection
