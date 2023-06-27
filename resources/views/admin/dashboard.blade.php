@extends('admin.layout.layout')
@section('content')
@push('css')
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
<h1>Data Mahasiswa</h1>
<div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">DataTable with default features</h3> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>UID</th>
          <th>NIM</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jurusan</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>101010101</td>
          <td>2031730128</td>
          <td>10101010101</td>
          <td>Wildan Mauluddana</td>
          <td>3A</td>
          <td>MI</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th>UID</th>
            <th>NIM</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
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
//     $(function() {
//     $('#example1').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             {
//                 extend: 'print',
//                 title: 'Data Mahasiswa'
//             },
//             {
//                 extend: 'excelHtml5',
//                 title: 'Data Mahasiswa'
//             },
//             {
//                 extend: 'csvHtml5',
//                 title: 'Data Mahasiswa'
//             },
//             {
//                 extend: 'pdfHtml5',
//                 title: 'Data Mahasiswa'
//             }
//         ]
//     }).buttons(title:'Data Mahasiswa').container().appendTo('#example1_wrapper .col-md-6:eq(0)');
// });
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
    // $(function() {
    //     $('#example1').DataTable({
    //         responsive: true,
    //         lengthChange: false,
    //         autoWidth: false,
    //         buttons: [
    //             title: "Copy",
    //             {
    //                 extend: 'print'
    //             },
    //             {
    //                 extend: 'excel',
    //                 title: 'Data Mahasiswa'
    //             },
    //             {
    //                 extend: 'csv',
    //                 title: 'Data Mahasiswa'
    //             },
    //             {
    //                 extend: 'pdf',
    //                 title: 'Data Mahasiswa'
    //             }
    //         ]
    //     });
    // });
  </script>
@endpush
