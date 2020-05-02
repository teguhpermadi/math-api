<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TujuanResource;
use App\Tujuan;
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    public function get(Request $request)
    {
        if($request->has('id') == true){
            // jika mengirimkan id
            $tujuan = Tujuan::find($request->id);
            return new TujuanResource($tujuan);
        } else {
            // jika tidak mengirimkan id
            $tujuan = Tujuan::paginate(10);
            return TujuanResource::collection($tujuan);
        }
    }

    public function update(Request $request, $id)
    {
        $tujuan = Tujuan::find($id);

        $tujuan->update([
            'kd3_id' => $request->kd3_id,
            'kd4_id' => $request->kd4_id,
            'deskripsi' => $request->deskripsi,
        ]);

        return new TujuanResource($tujuan);
    }

    public function delete($id)
    {
        $tujuan = Tujuan::find($id);

        $tujuan->delete($id);

        return ['message' => 'Data was deleted'];
    }
}
