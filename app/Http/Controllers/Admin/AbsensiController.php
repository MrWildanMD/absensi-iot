<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class AbsensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::with(['mhs','jadwal'])->get();
        $mahasiswas = Mahasiswa::all();
        $jadwals = Jadwal::all();
        $title = 'Data Absensi';
        return view('admin.absensi', compact('absensi', 'title', 'mahasiswas', 'jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $jadwals = Jadwal::all();
        return view('admin.absensi-action', ['absensi' => new Absensi(), 'mahasiswas' => $mahasiswas, 'jadwals' => $jadwals]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mhs_id' => 'required',
            'jadwal_id' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',

        ]);
        $jadwal = jadwal::where('id', $request->jadwal_id)->first();
        $day = Carbon::now()->format('l');
        $now = Carbon::now();

        if (strtolower($jadwal->hari) == strtolower($day)) {
            $jamMulai = Carbon::parse($jadwal->jam_mulai);
            $jamBerakhir = Carbon::parse($jadwal->jam_berakhir);

            if ($now < $jamMulai) {
                return redirect()->back()->with('msg', 'Kelas belum dimulai !!');
            } else if ($now > $jamBerakhir) {
                $telat = $now->diffInMinutes($jamBerakhir); // Selisih dalam menit

                // Memeriksa apakah telat kurang dari 1 jam (60 menit)
                if ($telat < 60) {
                    $status = "Terlambat $telat menit.";
                    $this->addAbsen($request->all(), $status);
                    return redirect()->back()->with('msg', "Telat $telat menit.");
                } else {
                    // Menghitung jam dan menit terlambat
                    $jamTelat = floor($telat / 60); // Jam
                    $menitTelat = $telat % 60; // Menit
                    $status = "Terlambat $jamTelat jam $menitTelat menit.";
                    $this->addAbsen($request->all(), $status);

                    return redirect()->back()->with('msg', "Telat $jamTelat jam $menitTelat menit.");
                }
            } else {
                $status = "Absen tepat waktu";
                $this->addAbsen($request->all(), $status);

                return redirect()->back()->with('msg','Berhasil absen tepat waktu');
            }


        } else {
            return redirect()->back()->with('msg','Tidak ada jadwal perkuliahan !!');

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function addAbsen($absen, $status)
    { 
        Absensi::create([
            'jam' => Carbon::now()->format('H:i:s'),
            'tanggal' => Carbon::now(),
            'uid' => $absen['mhs_id'],
            'status' => $status,
            'id_jadwal' => $absen['jadwal_id'],
            'kelas' => $absen['kelas'],
            'jurusan' => $absen['jurusan'],
        ]);
    }
}
