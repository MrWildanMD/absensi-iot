<div class="modal-content">
    <form id="formAction" action="{{ $mahasiswa->id ? route('mahasiswa.update', $mahasiswa->id) : route('mahasiswa.store') }}"
        method="POST">
        @csrf
        @if ($mahasiswa->id)
            @method('PUT')
        @endif
        <div class="modal-header bg-success">
            <h5 class="modal-title white" id="myModalLabel110">
                {{ $mahasiswa->id ? 'Edit mahasiswa' : 'Tambah mahasiswa' }}
            </h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <button id="fetchktp" type="button" class="btn btn-success ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Scan e-KTP</span>
                </button>
            </div>
            <div class="form-group">
                <label>ID e-KTP</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">ID e-KTP:</span>
                            <input type="text" class="form-control" name="uid" value="{{ $mahasiswa->uid }}"
                                placeholder="Masukkan ID e-KTP" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>NIK</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">NIK:</span>
                            <input type="text" class="form-control" name="nik" value="{{ $mahasiswa->nik }}"
                                placeholder="Masukkan NIK" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>Nama</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">Nama:</span>
                            <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->nama }}"
                                placeholder="Masukkan Nama" aria-label="matkul" aria-describedby="matkul" id="inputnama">
                        </div>
            </div>
            <div class="form-group">
                <label>TTL</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">TTL:</span>
                            <input type="text" class="form-control" name="ttl" value="{{ $mahasiswa->ttl }}"
                                placeholder="Masukkan TTL" aria-label="matkul" aria-describedby="matkul" id="input-ttl">
                        </div>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">Jenis Kelamin:</span>
                            <input type="text" class="form-control" name="jk" value="{{ $mahasiswa->jk }}"
                                placeholder="Masukkan Jenis Kelamin" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">Alamat:</span>
                            <input type="text" class="form-control" name="alamat" value="{{ $mahasiswa->alamat }}"
                                placeholder="Masukkan Alamat" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>RT/RW</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">RT/RW:</span>
                            <input type="text" class="form-control" name="rtrw" value="{{ $mahasiswa->rtrw }}"
                                placeholder="Masukkan RT/RW" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>Kelurahan</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">Kelurahan:</span>
                            <input type="text" class="form-control" name="kelurahan" value="{{ $mahasiswa->kelurahan }}"
                                placeholder="Masukkan Kelurahan" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>kecamatan</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">kecamatan:</span>
                            <input type="text" class="form-control" name="kecamatan" value="{{ $mahasiswa->kecamatan }}"
                                placeholder="Masukkan kecamatan" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>agama</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">agama:</span>
                            <input type="text" class="form-control" name="agama" value="{{ $mahasiswa->agama }}"
                                placeholder="Masukkan agama" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>status</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">status:</span>
                            <input type="text" class="form-control" name="status" value="{{ $mahasiswa->status }}"
                                placeholder="Masukkan status" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>pekerjaan</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">pekerjaan:</span>
                            <input type="text" class="form-control" name="pekerjaan" value="{{ $mahasiswa->pekerjaan }}"
                                placeholder="Masukkan pekerjaan" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>kewarganegaraan</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">kewarganegaraan:</span>
                            <input type="text" class="form-control" name="kewarganegaraan" value="{{ $mahasiswa->kewarganegaraan }}"
                                placeholder="Masukkan kewarganegaraan" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ $mahasiswa->id ? 'Save Changes' : 'Submit' }}</span>
            </button>
        </div>
    </form>
</div>
<script>
    $('#fetchktp').on('click', function() {
        // Make an Ajax request to fetch the data
        $.ajax({
            url: `{{route('fetchktp')}}`,
            method: 'GET',
            success: function(response) {
                $('#inputnama').val(response.nama);
                $('#input-ttl').val(response.tempat_lahir);
                // console.log(response)
            },
            error: function(xhr, status, error) {
                // Handle the error
                console.log(error)
            }
        });
    });
  </script>
