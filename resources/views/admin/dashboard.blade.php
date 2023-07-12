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
        <button id="btnAdd" type="button" class="btn btn-success mb-3"><i class="bi bi-plus-circle me-2"></i>Tambah Mahasiswa Baru</button>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID e-KTP</th>
          <th>NIK</th>
          <th>NAMA</th>
          <th>TTL</th>
          <th>JENIS KELAMIN</th>
          <th>ALAMAT</th>
          <th>RT/RW</th>
          <th>KEL/DES</th>
          <th>KECAMATAN</th>
          <th>AGAMA</th>
          <th>STATUS PERKAWINAN</th>
          <th>PEKERJAAN</th>
          <th>KEWARGANEGARAAN</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <th>1ff4654363d</th>
          <th>3506120405010004</th>
          <th>DANI ARDHIANSAH</th>
          <th>KEDIRI, 04 AGUSTUS 2001</th>
          <th>lAKI-LAKI</th>
          <th>JL MANGGIS</th>
          <th>006/002</th>
          <th>TURUS</th>
          <th>GAMPENGREJO</th>
          <th>ISLAM</th>
          <th>BELUM KAWIN</th>
          <th>PELAJAR/MAHASISWA</th>
          <th>WNI</th>
            </tr>
            {{-- @foreach ($mahasiswa as $mhs)
            <tr>
                <td>{{$mhs->uid}}</td>
                <td>{{$mhs->nik}}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{$mhs->ttl}}</td>
                <td>{{$mhs->jk}}</td>
                <td>{{$mhs->alamat}}</td>
                <td>{{$mhs->rtrw}}</td>
                <td>{{$mhs->kelurahan}}</td>
                <td>{{$mhs->kecamatan}}</td>
                <td>{{$mhs->agama}}</td>
                <td>{{$mhs->status}}</td>
                <td>{{$mhs->pekerjaan}}</td>
                <td>{{$mhs->kewarganegaraan}}</td>
              </tr>
            @endforeach --}}
        </tbody>
        <tfoot>
        <tr>
         <th>ID e-KTP</th>
          <th>NIK</th>
          <th>NAMA</th>
          <th>TTL</th>
          <th>JENIS KELAMIN</th>
          <th>ALAMAT</th>
          <th>RT/RW</th>
          <th>KEL/DES</th>
          <th>KECAMATAN</th>
          <th>AGAMA</th>
          <th>STATUS PERKAWINAN</th>
          <th>PEKERJAAN</th>
          <th>KEWARGANEGARAAN</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  {{-- <div class="modal fade text-left" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">

        </div>
    </div> --}}
    <div class="modal fade" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                url: "{{ url('mahasiswa/create') }}",
                success: function(res) {
                    $('#modalAction').find('.modal-dialog').html(res);
                    $('#modalAction').modal('show');
                    // modal.show();
                    store()
                }
            })
        })
        function store() {
            $('#formAction').on('submit', function(e) {
                e.preventDefault();
                // var formData = $('#formAction').serialize();
                const _form = this
                const formData = new FormData(_form)

                const url = this.getAttribute('action')
                console.log(formData)

                $.ajax({
                    method: 'POST',
                    url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        console.log(res);
                        // window.LaravelDataTables["example1"].ajax.reload();
                        $('#example1').DataTable().ajax.reload(null, false);
                        $('#modalAction').modal('hide');
                        // modal.hide();
                    },
                    error: function(res) {
                        let errors = res.responseJSON?.errors
                        $(_form).find('.text-danger.text-small').remove()
                        if (errors) {
                            for (const [key, value] of Object.entries(errors)) {
                                $(`[name='${key}']`).parent().append(
                                    `<span class="text-danger text-small">${value}</span>`
                                )
                            }
                        }
                    }
                })
            })
        }
  </script>

@endpush
