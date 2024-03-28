@extends('layout.master')
@section('medicines')
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
                        <h4>All Medicine</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=" ">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Medicine</a></li>
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

                    <div id="del_Medicine" style="display: none" class="alert alert-danger"><b>Deleted!</b>
                        Successfully!
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Medicine List </h4>
                                    <a href="{{ url('Medicine/create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3"
                                            class="display table align-items-center table-flush table-hover roles"
                                            style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Medicine Name</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($Medicines))
                                                    @foreach ($Medicines as $key => $Medicine)
                                                        <tr id="res_{{ $Medicine->id }}">
                                                            <td><strong>{{ $key + 1 }}</strong></td>
                                                            <td>{{ $Medicine->Medicine_fullname }}</td>
                                                            <td>{{ $Medicine->Medicine_email }}</td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="Medicine_status"
                                                                        name="Medicine_status"
                                                                        onchange="Medicine_status({{ $Medicine->id }})">
                                                                        <option disabled selected>Status</option>
                                                                        <option value="Active"
                                                                            {{ $Medicine->Medicine_status == 'Active' ? 'selected' : '' }}>
                                                                            Active</option>
                                                                        <option value="Inactive"
                                                                            {{ $Medicine->Medicine_status == 'Inactive' ? 'selected' : '' }}>
                                                                            Inactive</option>
                                                                        <option value="Pending"
                                                                            {{ $Medicine->Medicine_status == 'Pending' ? 'selected' : '' }}>
                                                                            Pending</option>
                                                                        <option value="Block"
                                                                            {{ $Medicine->Medicine_status == 'Block' ? 'selected' : '' }}>
                                                                            Block</option>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('Medicine/profile/' . $Medicine->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="la la-eye"></i>
                                                                </a>
                                                                <a href="{{ url('Medicine/edit/' . $Medicine->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="la la-pencil"></i>
                                                                </a>
                                                                <button class="btn btn-sm btn-danger"
                                                                    onclick="delete_Medicine({{ $Medicine->id }})">
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
        function delete_Medicine(id) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Are you sure ?')) {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('Medicine/delete') }}",
                    data: {
                        _token: _token,
                        id: id,
                    },
                    success: function(data) {
                        $("#res_" + id).slideUp(200);
                        $('#del_Medicine').hide(0);
                        $('#del_Medicine').slideDown(200);
                    }
                });
            }

        }

        function Medicine_status(id) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            let Medicine_status = $("#Medicine_status").val();

    
            $.ajax({
                type: 'POST',
                url: "{{ url('Medicine/status') }}",
                data: {
                    _token: _token,
                    id: id,
                    Medicine_status: Medicine_status,
                },
                success: function(data) {

                }
            });
        }
    </script>
@endsection
