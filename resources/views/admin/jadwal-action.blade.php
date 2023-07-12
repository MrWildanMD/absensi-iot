<div class="modal-content">
    <form id="formAction" action="{{ $jadwal->id ? route('jadwal.update', $jadwal->id) : route('jadwal.store') }}"
        method="POST">
        @csrf
        @if ($jadwal->id)
            @method('PUT')
        @endif
        <div class="modal-header bg-success">
            <h5 class="modal-title white" id="myModalLabel110">
                {{ $jadwal->id ? 'Edit Jadwal' : 'Tambah Jadwal' }}
            </h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Kode Matkul</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">Kode Matkul:</span>
                            <input type="text" class="form-control" name="kode_matkul" value="{{ $jadwal->kode_matkul }}"
                                placeholder="Masukkan kode matkul" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="form-group">
                <label>Nama Matkul</label>
                        <div class="input-group">
                            <span class="input-group-text" id="matkul">Nama Matkul:</span>
                            <input type="text" class="form-control" name="nama_matkul" value="{{ $jadwal->nama_matkul }}"
                                placeholder="Masukkan nama matkul" aria-label="matkul" aria-describedby="matkul" id="inputmatkul">
                        </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="time" class="form-control" value="{{ $jadwal->jam_mulai }}" name="jam_mulai"
                            id="jam_mulai" placeholder="Masukkan jam mulai">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jam_berakhir">Jam Berakhir</label>
                        <input type="time" class="form-control" value="{{ $jadwal->jam_berakhir }}" name="jam_berakhir"
                            id="jam_berakhir" placeholder="Masukkan jam berakhir">
                    </div>
                </div>
            </div>
            <div class="form-group">
            <label>Hari</label>
                    <div class="input-group">
                        <span class="input-group-text" id="hari">Hari:</span>
                        <input type="text" class="form-control" name="hari" value="{{ $jadwal->hari }}"
                            placeholder="Masukkan hari" aria-label="hari" aria-describedby="hari" id="inputhari">
                    </div>
            </div>
            <div class="form-group">
                <label for="user_id" class="form-label">Dosen</label>
                <select class="form-control" name="user_id" id="user_id">
                    <option selected>--Pilih Dosen--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ $jadwal->id ? 'Save Changes' : 'Submit' }}</span>
            </button>
        </div>
    </form>
</div>
