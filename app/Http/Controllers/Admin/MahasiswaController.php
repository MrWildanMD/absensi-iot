<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
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
        $mahasiswa = Mahasiswa::all();
        $title = 'Data Mahasiswa';
        return view('admin.dashboard', compact('mahasiswa', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa-action', ['mahasiswa' => new Mahasiswa()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        Mahasiswa::create($requestData);
        return response()->json([
            'status' => 'success',
            'message' => 'Data maba berhasil ditambahkan'
        ]);
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

    // public function fetchktp()
    // {
    // $response = Http::get('http://zqbynh0oxa.loclx.io/ocr'); // Replace 'your-api-endpoint' with the actual API endpoint to fetch data from
    // $data = $response->json();

    // return $data;
    // }
}
