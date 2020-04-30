<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KDIndikatorResource;
use App\Http\Resources\KompetensiDasarResource;
use App\KompetensiDasar;
use Illuminate\Http\Request;

class KompetensiDasarController extends Controller
{
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

    public function get(Request $request)
    {
        $id = $request->id;
        $jenis = $request->jenis;

        switch (true) {
            case ($request->has('id') and $request->has('indikator')):
                // mengirimkan id dan indikator (dengan indikator)
                $kd = KompetensiDasar::find($id);
                return new KDIndikatorResource($kd);
                break;
            case ($request->has('jenis') and $request->has('indikator')):
                // mengirimkan jenis dan indikator (dengan indikator)
                $kd = KompetensiDasar::where('jenis', $jenis)->paginate();
                return KDIndikatorResource::collection($kd);
                break;
            case ($request->has('id')):
                // mengirimkan parameter id (tanpa indikator)
                $kd = KompetensiDasar::find($id);
                return new KompetensiDasarResource($kd);
                break;
            case ($request->has('jenis')):
                // mengirimkan param jenis (tanpa indikator)
                $kd = KompetensiDasar::where('jenis', $jenis)->get();
                return KompetensiDasarResource::collection($kd);
                break;
            default:
                // tidak mengirimkan parameter sama sekali (tanpa indikator)
                $kd = KompetensiDasar::paginate(10);
                return KompetensiDasarResource::collection($kd);
                break;
        }
    }
}
