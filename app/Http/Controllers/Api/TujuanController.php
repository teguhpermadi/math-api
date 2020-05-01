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
}
