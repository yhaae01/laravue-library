@extends('layouts.admin')
@section('title', 'Publisher')
@section('css')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" @click="addData()" class="btn btn-primary btn-sm"><span
                            class="fas fa-plus"></span>
                        Add New Publisher</button>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Created at</th>
                                <th class="text-center" style="width: 50px">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="my-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Publisher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form :action="actionUrl" method="post" @submit="submitForm($event, data.id)">
                    @csrf
                    {{-- Hanya muncul ketika edit --}}
                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input class="form-control" type="text" name="name" :value="data.name" id="">   
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="email" name="email" :value="data.email" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input class="form-control" type="number" name="phone" :value="data.phone" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input class="form-control" type="text" name="address" :value="data.address" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span
                                class="fas fa-ban"></span> Close</button>
                        <button type="submit" class="btn btn-primary btn-sm"><span class="fas fa-save"></span>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- Datatables -->
    <script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    
    <script>
        var actionUrl = '{{ url('publishers') }}';
        var apiUrl = '{{ url('api/publishers') }}';

        var columns = [
            { data: 'DT_RowIndex', class: 'text-center', orderable: true },
            { data: 'name', orderable: true },
            { data: 'email', orderable: true },
            { data: 'phone', class: 'text-center', orderable: true },
            { data: 'address', orderable: true },
            { data: 'date', class: 'text-center', orderable: true },
            { render: function (index, row, data, meta) {
                    return `
                        <a href="#" class="badge badge-warning py-2 px-3 mb-2" onclick="controller.editData(event, ${meta.row})">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="badge badge-danger py-2 px-3 mb-2" onclick="controller.deleteData(event, ${data.id})">
                            <i class="fas fa-trash"></i>
                        </a>
                    `;
                }, orderable: false, width: '100px', class: 'text-center' },
        ];
    </script>
    <script src="{{ asset('js/myjs.js') }}"></script>
@endsection
