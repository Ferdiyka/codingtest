<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EskulController extends Controller
{
    //index
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        //get eskuls with pagination
        $eskuls = DB::table('eskul')
        ->where(function ($query) use ($keyword) {
            $query->where('nama_eskul', 'like', '%' . $keyword . '%')
                  ->orWhere('jenis_eskul', 'like', '%' . $keyword . '%');
        })
        ->paginate(5);
        return view('pages.eskul.index', ['eskuls' => $eskuls, 'keyword' => $keyword]);
    }

    public function create()
    {
        return view('pages.eskul.create');
    }

    //store
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_eskul' => 'required|string|max:255',
            'jenis_eskul' => 'required|string|max:255',
        ]);

        Eskul::create($data);
        return redirect()->route('eskul.index')->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    //show
    public function show($id)
    {
        return view('pages.dashboard');
    }

    //edit
    public function edit($id)
    {
        $eskul = Eskul::findOrFail($id);
        return view('pages.eskul.edit', compact('eskul'));
    }

    //update
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $eskul = Eskul::findOrFail($id);
        $eskul->update($data);
        return redirect()->route('eskul.index');
    }

    public function destroy($id)
    {
        $eskul = Eskul::findOrFail($id);

        $eskul->delete();

        return redirect()->route('eskul.index');
    }
}
