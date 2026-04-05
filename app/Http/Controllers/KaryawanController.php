<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\User;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with('user')->get();
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        // SIMPAN USER
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'karyawan'
        ]);

        // SIMPAN KARYAWAN
        Karyawan::create([
            'user_id' => $user->id,
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect('/karyawan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::with('user')->findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        // UPDATE USER
        $karyawan->user->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        // UPDATE KARYAWAN
        $karyawan->update([
            'jabatan' => $request->jabatan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect('/karyawan')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        // hapus user sekalian (cascade juga bisa)
        $karyawan->user()->delete();
        $karyawan->delete();

        return redirect('/karyawan')->with('success', 'Data berhasil dihapus');
    }
}