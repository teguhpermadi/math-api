<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KompetensiDasarResource;
use App\Indikator;
use App\KompetensiDasar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $indikator = $request->indikator;

        $params = ['id' => $id, 'jenis' => $jenis, 'indikator' => $indikator];

        if(isset($params['id']) == false && isset($params['jenis']) == false && isset($params['indikator']) == false)
        {
            // jika tidak mengirimkan parameter
            $kd = KompetensiDasar::paginate(10);
            return KompetensiDasarResource::collection($kd);
        } else if(isset($params['id']) == true && isset($params['indikator']) == true)
        { 
            // jika mengirimkan id dan indikator
            $kd = KompetensiDasar::find($params['id']);
            $ind = Indikator::where('kompetensidasar_id', $kd['id'])->get();

            return [
                'data' => [
                    'id' => $kd['id'],
                    'jenis' => $kd['jenis'],
                    'kode' => $kd['kode'],
                    'deskripsi' => $kd['deskripsi'],
                    'indikator' => $ind,
                ]
            ];
        } else if(isset($params['id']) == true AND isset($params['indikator']) == false)
        {
            // jika mengirimkan id dan tidak mengirimkan indikator
            $kd = KompetensiDasar::find($params['id']);
            return new KompetensiDasarResource($kd);
        } else if(isset($params['jenis']) == true AND isset($params['indikator']) == true)
        {
            // mengirimkan jenis dan indikator
            $kd = DB::table('kompetensi_dasars')
                    ->join('indikators', 'kompetensi_dasars.id', '=', 'indikators.kompetensidasar_id')
                    ->get();
            return $kd;
        }

        // if(empty($id) && empty($jenis))
        // {
        //     $kd = KompetensiDasar::paginate(10);
        //     return KompetensiDasarResource::collection($kd);
        // } else if(!empty($id) && empty($indikator))
        // {
        //     $kd = KompetensiDasar::find($id);
        //     return new KompetensiDasarResource($kd);
        // } else if(!empty($jenis) && empty($indikator))
        // {
        //     $kd = KompetensiDasar::where('jenis', $jenis)->paginate(10);
        //     return KompetensiDasarResource::collection($kd);
        // } else if(!empty($id) && !empty($indikator))
        // {
        //     $kd = KompetensiDasar::find($id);
        //     $ind = Indikator::where('kompetensidasar_id', $kd['id'])->get();

        //     return [
        //         'data' => [
        //             'id' => $kd['id'],
        //             'jenis' => $kd['jenis'],
        //             'kode' => $kd['kode'],
        //             'deskripsi' => $kd['deskripsi'],
        //             'indikator' => $ind,
        //         ]
        //     ];
        // } else if(empty($id) && !empty($indikator))
        // {
        // }
    }
}
