<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IndikatorResource;
use App\Indikator;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    public function index()
    {
        $ind = Indikator::paginate(10);

        return IndikatorResource::collection($ind);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'title' => ['required', 'unique:posts', 'max:255'],
            'kd_id' => ['required'],
            'kode' => ['required'],
            'deskripsi' => ['required'],
        ]);

        $ind = Indikator::create([
            'user_id' => auth()->id(),
            'kd_id' => $request->kd_id,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
        ]);

        return new IndikatorResource($ind);
    }

    public function show($id)
    {
        $ind = Indikator::find($id);

        if(!empty($kd)){
            return new IndikatorResource($ind);
        } else {
            return ['error' => 'Data not found'];
        }
    }

    public function update(Request $request, $id)
    {
        $ind = Indikator::find($id);

        $ind->update([
            'kd_id' => $request->kd_id,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
        ]);

        return new IndikatorResource($ind);
    }

    public function delete($id)
    {
        $ind = Indikator::find($id);
        $ind->delete();

        return ['message' => "Data was deleted"];
    }
}
