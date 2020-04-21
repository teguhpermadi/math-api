<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KompetensiIntiResource;
use App\KompetensiInti;
use Illuminate\Http\Request;

class KompetensiIntiController extends Controller
{
    public function index()
    {
        // $ki = KompetensiInti::get(); // diurutkan berdasarkan id terkecil
        $ki = KompetensiInti::paginate(10); // pagination
        // $ki = KompetensiInti::latest()->get(); // diurutkan berdasarkan id terbesar

        return KompetensiIntiResource::collection($ki);
    }

    public function show($id)
    {
        $ki = KompetensiInti::find($id);

        if(!empty($ki)){
            // jika data ditemukan
            return new KompetensiIntiResource($ki);
        } else {
            // jika data tidak ditemukan
            return ['error' => 'Data not found'];
        }
    }

    public function update(Request $request, $id)
    {
        $ki = KompetensiInti::find($id);

        $ki->update([
            'deskripsi' => $request->deskripsi,
        ]);

        return new KompetensiIntiResource($ki);
    }

    public function delete($id)
    {
        $ki = KompetensiInti::find($id);
        $ki->delete();

        return ['message' => 'Data was deleted'];
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'deskripsi' => 'required',
        // ]);

        $validatedData = $request->validate([
            // 'title' => ['required', 'unique:posts', 'max:255'],
            'deskripsi' => ['required'],
        ]);

        $ki = KompetensiInti::create([
            'user_id' => auth()->id(),
            'deskripsi' => $request->deskripsi,
        ]);

        // return response()->json($validatedData);
        return new KompetensiIntiResource($ki);
    }
}
