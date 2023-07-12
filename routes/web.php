<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\JadwalContaroller;
use App\Http\Controllers\Admin\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    // Route::get('/', [AuthenticatedSessionController::class, 'create']);
    Route::get('/', function() {
        return view('auth.login');
    });
});

// Route::get('/time', function () {
//     $testParse = Carbon::parse('2023-7-3');
//     // $testParse->locale('id');
//     $dateFormatted = $testParse->translatedFormat('Y-m-d');
//     $dayName = $testParse->translatedFormat('l');
// $data = [
//     'date' => $dateFormatted,
//     'day_name' => $dayName,
// ];
//     return dd($data);
// });

// Route::get('/time', function () {
//     $status = "";
//     $recordTime = "15:29";
//     $currTime = now()->format('H:i');
//     $parseRecordTime = Carbon::parse($recordTime);
//     $parseCurrentTime = Carbon::parse($currTime);
//     if($parseRecordTime->diffInMinutes($parseCurrentTime) >= 5) {
//         $status = "Terlambat";
//     } else {
//         $status = "Sukses";
//     }
//     return dd($status);
// });

Route::get('/dashboard', [MahasiswaController::class, 'index'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('jadwal', JadwalContaroller::class);

// Route::get('/mahasiswa/fetchktp', [MahasiswaController::class,''])->name('fetchktp');
Route::get('/fetchktp', function(){
    $response = Http::get('https://39ddb6b19944-17412326226799592876.ngrok-free.app/ocr'); // Replace 'your-api-endpoint' with the actual API endpoint to fetch data from
    $data = $response->json();
    return $data;
})->name('fetchktp');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
