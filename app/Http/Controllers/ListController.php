<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ListController extends Controller
{
    // List semua data gabungan siswa dan eskul
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        //get eskuls with pagination
        $data = Siswa::with('eskul')
        ->when($keyword, function ($query, $keyword) {
            return $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('last_name', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('eskul', function ($q) use ($keyword) {
                      $q->where('nama_eskul', 'LIKE', '%' . $keyword . '%');
                  });
            });
        })
        ->paginate(10);
        return view('pages.list.index', compact('data', 'keyword'));
    }

    // Menampilkan form untuk menambahkan gabungan siswa dan eskul
    public function create()
    {
        $siswas = Siswa::all();
        $eskuls = Eskul::all();
        return view('pages.list.create', compact('siswas', 'eskuls'));
    }

    // Simpan data gabungan siswa dan eskul
    public function store(Request $request)
    {

        $siswa = Siswa::find($request->siswa_id);
        $siswa->eskul()->attach($request->eskul_id, ['tahun_mulai' => $request->tahun_mulai]);

        return redirect()->route('list.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit gabungan siswa dan eskul
    public function edit($siswa_id, $eskul_id)
    {
        $siswas = Siswa::all();
        $eskuls = Eskul::all();
        $siswa = Siswa::findOrFail($siswa_id);
        $eskul = $siswa->eskul()->where('eskul.id', $eskul_id)->first();
        return view('pages.list.edit', compact('siswa', 'eskul', 'siswas', 'eskuls'));
    }

    // Update data gabungan siswa dan eskul
    public function update(Request $request, $siswa_id, $eskul_id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'eskul_id' => 'required|exists:eskul,id',
            'tahun_mulai' => 'required|integer',
        ]);

        $siswa = Siswa::findOrFail($siswa_id);
        $siswa->eskul()->updateExistingPivot($eskul_id, ['tahun_mulai' => $request->tahun_mulai]);

        return redirect()->route('list.index')->with('success', 'Ekstrakurikuler berhasil diupdate.');
    }

    // Hapus data gabungan siswa dan eskul
    public function destroy($siswa_id, $eskul_id)
    {
        $siswa = Siswa::findOrFail($siswa_id);
        $siswa->eskul()->detach($eskul_id);

        return redirect()->route('list.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
