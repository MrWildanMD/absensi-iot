<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalRequest;

class JadwalContaroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::with('users')->get();
        $title = 'Data Jadwal';
        // dd($jadwal);
        return view('admin.jadwal', compact('jadwal', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        // $jadwal = Jadwal::all();
        return view('admin.jadwal-action', ['jadwal' => new Jadwal(), 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalRequest $request)
    {
        // dd($request->all());
        if ($request->validated())
        {
            $requestData = $request->all();
            Jadwal::create($requestData);
            return response()->json([
                'status' => 'success',
                'message' => 'Data jadwal berhasil ditambahkan',
            ]);
        }
        // $requestData = $request->all();
        //     Jadwal::create($requestData);
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Data jadwal berhasil ditambahkan'
        //     ]);
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
}
