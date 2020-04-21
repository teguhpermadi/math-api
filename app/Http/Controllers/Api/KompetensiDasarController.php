<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KompetensiDasarResource;
use App\KompetensiDasar;
use Illuminate\Http\Request;

class KompetensiDasarController extends Controller
{
    public function index()
    {
        $kd = KompetensiDasar::paginate(10);

        return KompetensiDasarResource::collection($kd);
    }
    
    public function show($id)
    {
        $kd = KompetensiDasar::find($id);

        if(!empty($kd)){
            return new KompetensiDasarResource($kd);
        } else {
            return ['error' => 'Data not found'];
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'title' => ['required', 'unique:posts', 'max:255'],
            'kode' => ['required'],
            'jenis' => ['required'],
            'deskripsi' => ['required'],
        ]);

        $kd = KompetensiDasar::create([
            'user_id' => auth()->id(),
            'kode' => $request->kode,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
        ]);

        return new KompetensiDasarResource($kd);
    }


    public function update(Request $request, $id)
    {
        $kd = KompetensiDasar::find($id);

        $kd->update([
            'kode' => $request->kode,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
        ]);

        return new KompetensiDasarResource($kd);
    }

    public function delete($id)
    {
        $kd = KompetensiDasar::find($id);

        $kd->delete();
        
        return ['message' => 'Data was deleted'];
    }

    public function pengetahuan()
    {
        $kd = KompetensiDasar::where('jenis', 'pengetahuan')->paginate(10);
        return KompetensiDasarResource::collection($kd);
    }

    public function keterampilan()
    {
        $kd = KompetensiDasar::where('jenis', 'keterampilan')->paginate(10);
        return KompetensiDasarResource::collection($kd);
    }
}
