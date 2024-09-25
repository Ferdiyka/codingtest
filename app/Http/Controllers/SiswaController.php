<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SiswaRequest;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        //get siswas with pagination
        $siswas = DB::table('siswa')
            ->where(function ($query) use ($keyword) {
                $query->where('first_name', 'like', '%' . $keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $keyword . '%')
                    ->orWhere('phone', 'like', '%' . $keyword . '%')
                    ->orWhere('nis', 'like', '%' . $keyword . '%')
                    ->orWhere('address', 'like', '%' . $keyword . '%')
                    ->orWhere('gender', 'like', '%' . $keyword . '%');
            })
            ->paginate(5);
        return view('pages.siswa.index', ['siswas' => $siswas, 'keyword' => $keyword]);
    }
    //create
    public function create()
    {
        return view('pages.siswa.create');
    }

    //store
    public function store(SiswaRequest $request)
    {
        $filename = time() . '.' . $request->picture->extension();
        $request->picture->storeAs('public/siswa', $filename);

        $siswa = new Siswa;
        $siswa->first_name = $request->first_name;
        $siswa->last_name = $request->last_name;
        $siswa->phone = $request->phone;
        $siswa->nis = $request->nis;
        $siswa->address = $request->address;
        $siswa->gender = $request->gender;
        $siswa->picture = $filename;
        $siswa->save();

        return redirect()->route('siswa.index');
    }

    //edit
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('pages.siswa.edit', compact('siswa'));
    }

    //update
    public function update(SiswaRequest $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        // Check if a new picture is uploaded
        if ($request->hasFile('picture')) {
            $filename = time() . '.' . $request->picture->getClientOriginalExtension();
            $request->picture->storeAs('public/siswa', $filename);
            $siswa->picture = $filename;
        } else {
            // No new picture was uploaded, keep the existing picture
        }

        // Update other fields
        $siswa->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'nis' => $request->nis,
            'address' => $request->address,
        ]);

        return redirect()->route('siswa.index')->with('success', 'siswa updated successfully');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Product deleted successfully');
    }
}
