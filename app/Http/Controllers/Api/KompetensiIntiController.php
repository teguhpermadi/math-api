<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KompetensiIntiResource;
use App\KompetensiInti;
use Illuminate\Http\Request;

class KompetensiIntiController extends Controller
{
    public function get(Request $request)
    {
        $id = $request->id;

        if(empty($id)){ // jika tidak mengirimkan id maka tampilkan semua datanya
            $ki = KompetensiInti::paginate(10); // pagination
            return KompetensiIntiResource::collection($ki);
        } else if(!empty($id)) // jika mengirimkan id maka tampilkan satu datanya
        {
            $ki = KompetensiInti::find($id);
            return new KompetensiIntiResource($ki);
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
