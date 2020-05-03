<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MateriResource;
use App\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function get(Request $request)
    {
        if($request->has('id') == true){
            // jika mengirimkan id
            $materi = Materi::find($request->id);
            return new MateriResource($materi);
        } else {
            // jika tidak mengirimkan id
            $materi = Materi::paginate(10);
            return MateriResource::collection($materi);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'title' => ['required', 'unique:posts', 'max:255'],
            'tujuan_id' => ['required'],
            'gambar' => ['required'],
            'deskripsi' => ['required'],
        ]);

        $materi = Materi::create([
            'user_id' => auth()->id(),
            'tujuan_id' => $request->tujuan_id,
            'gambar' => $request->gambar,
            'deskripsi' => $request->deskripsi,
        ]);

        return new MateriResource($materi);
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::find($id);

        $materi->update([
            'tujuan_id' => $request->tujuan_id,
            'gambar' => $request->gambar,
            'deskripsi' => $request->deskripsi,
        ]);

        return new MateriResource($materi);
    }

    public function delete($id)
    {
        $materi = Materi::find($id);
        $materi->delete($id);
        return ['message' => 'Data was deleted'];

    }
}
