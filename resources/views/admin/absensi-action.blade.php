<div class="modal-content">
    <form id="formAction" action="{{ $absensi->id ? route('absensi.update', $absensi->id) : route('absensi.store') }}"
        method="POST">
        @csrf
        @if ($absensi->id)
            @method('PUT')
        @endif
        <div class="modal-header bg-success">
            <h5 class="modal-title white" id="myModalLabel110">
                {{ $absensi->id ? 'Edit absensi' : 'Tambah absensi' }}
            </h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="mahasiswa_select">Pilih mahasiswa</label>
                <div class="input-group">
                    <span class="input-group-text" id="absensi">Mahasiswa:</span>
                    <select class="form-control" name="mhs_id" id="mahasiswa_select" aria-label="absensi"
                        aria-describedby="absensi">
                        <option value="">Pilih Mahasiswa</option>
                        @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}" {{ $absensi->kode_absensi == $mahasiswa->id ? 'selected' : '' }}>
                                {{ $mahasiswa->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="mahasiswa_select">Pilih jadwal</label>
                <div class="input-group">
                    <span class="input-group-text" id="absensi">jadwal  :</span>
                    <select class="form-control" name="jadwal_id" id="mahasiswa_select" aria-label="absensi"
                        aria-describedby="absensi">
                        <option value="">Pilih jadwal</option>
                        @foreach ($jadwals as $jadwal)
                            <option value="{{ $jadwal->id }}">
                                {{ $jadwal->nama_matkul }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                {{-- <div class="col-md-4">
                    <div class="form-group">
                        <label for="jam_mulai">Nama</label>
                        <input type="text" class="form-control" value="{{ $absensi->jam_mulai }}" name="jam_mulai"
                            id="jam_mulai" placeholder="Masukkan nama">
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jam_berakhir">Kelas</label>
                        <input type="text" class="form-control" value="{{ $absensi->jam_berakhir }}"
                            name="kelas" id="jam_berakhir" placeholder="Masukkan kelas">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jam_berakhir">Jurusan</label>
                        <input type="text" class="form-control" value="{{ $absensi->jam_berakhir }}"
                            name="jurusan" id="jam_berakhir" placeholder="Masukkan jurusan">
                    </div>
                </div>
            </div>
            {{-- <div class="form-group">
                <label>Status</label>
                <div class="input-group">
                    <span class="input-group-text" id="hari">Status:</span>
                    <input type="text" class="form-control" name="hari" value="{{ $absensi->hari }}"
                        placeholder="Masukkan status" aria-label="hari" aria-describedby="hari" id="inputhari">
                </div>
            </div> --}}
            {{-- <div class="form-group">
                <label for="user_id" class="form-label">Dosen</label>
                <select class="form-control" name="user_id" id="user_id">
                    <option selected>--Pilih Dosen--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div> --}}
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">{{ $absensi->id ? 'Save Changes' : 'Submit' }}</span>
            </button>
        </div>
    </form>
</div>
