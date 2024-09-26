@extends('admin.layout.layout')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
<h1>Data Absensi</h1>
<div class="card">
    <div class="card-header">
      @if(session('msg'))
    <div class="alert alert-warning">
        {{ session('msg') }}
    </div>
@endif

      {{-- <h3 class="card-title">DataTable with default features</h3> --}}
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <button id="btnAdd" type="button" class="btn btn-success mb-3"><i class="bi bi-plus-circle me-2"></i>Tambah Absensi Baru</button>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>UID</th>
          <th>Tanggal</th>
          <th>Nama</th>
          <th>Mata Kuliah</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Status</th>
          <th>Waktu Absen</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($absensi as $key => $abs)
            <tr>
              <td>{{ $abs->mhs?->uid }}</td>
              <td>{{ $abs->tanggal }}</td>
              <td>{{ $abs->mhs?->nama }}</td>
              <td>{{ $abs->jadwal?->nama_matkul }}</td>
              <td>{{ $abs->kelas }}</td>
              <td>{{ $abs->jurusan }}</td>
              <td>{{ $abs->status }}</td>
              <td>{{ $abs->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>UID</th>
          <th>Tanggal</th>
          <th>Nama</th>
          <th>Mata Kuliah</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Status</th>
          <th>Waktu Absen</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  <div class="modal fade text-left" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [
            "csv",
            "excel",
            "pdf",
            "print"
        ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    $('#btnAdd').on('click', function() {
            $.ajax({
                method: 'GET',
                url: "{{ url('absensi/create') }}",
                success: function(res) {
                    $('#modalAction').find('.modal-dialog').html(res);
                    $('#modalAction').modal('show');
                    // modal.show();
                    store()
                }
            })
        })
  </script>
@endpush
