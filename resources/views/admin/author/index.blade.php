@extends('admin.templates.default')

@section('content')
    <h1>Penulis</h1>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Penulis</h3>
            <a href="{{ route('admin.author.create') }}" class="btn btn-primary">Tambah Penulis</a>
        </div>
        <div class="box-body">
            <table id="datatable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <form action="" method="POST" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="Hapus" style="display: none">
    </form>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
    {{-- Bootstrap Notify --}}
    <script src="{{ asset('assets/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    @include('admin.templates.partials.alerts')
    <script>
        $(function () {
            $('#datatable').DataTable({
                processing  : true,
                serverSide  : true,
                ajax        : '{{ route('admin.author.data') }}',
                columns      : [
                    // default
                    // { data: 'id' },

                    // order by index
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name' },
                    { data: 'action' },
                ]
            })
        });
    </script>
@endpush