@extends('admin.layout.layout')
@section('content')
@push('css')
{{-- <link rel="stylesheet" href="{{ url('admin/css/form-element-select.css') }}"> --}}
@endpush
<h1>Data Jadwal</h1>
<div class="card">
    <div class="card-header">
      {{-- <h3 class="card-title">DataTable with default features</h3> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <button id="btnAdd" type="button" class="btn btn-success mb-3"><i class="bi bi-plus-circle me-2"></i>Tambah Jadwal Baru</button>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>MATKUL</th>
          <th>JAM MULAI</th>
          <th>JAM BERAKHIR</th>
          <th>HARI</th>
          <th>NAMA DOSEN</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $j)
            <tr>
            <td>{{$j->nama_matkul}}</td>
            <td>{{$j->jam_mulai}}</td>
            <td>{{$j->jam_berakhir}}</td>
            <td>{{$j->hari}}</td>
            <td>{{$j->users->name}}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
        <th>MATKUL</th>
          <th>JAM MULAI</th>
          <th>JAM BERAKHIR</th>
          <th>HARI</th>
          <th>NAMA DOSEN</th>
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
            {{-- @include('admin.jadwal-action') --}}
        </div>
    </div>
@endsection
@push('scripts')
<script src="{{ url('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
{{-- <script src="{{ url('admin/js/form-element-select.js') }}"></script> --}}
<script>
    $('#btnAdd').on('click', function() {
            $.ajax({
                method: 'GET',
                url: "{{ url('jadwal/create') }}",
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
                const _form = this
                const formData = new FormData(_form)
                console.log(_form)

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
                        $('#example1').DataTable().ajax.reload(null, false);
                        $('#modalAction').modal('hide');
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
