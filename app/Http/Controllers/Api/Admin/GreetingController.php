<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Greeting;

class GreetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $greeting = Greeting::findOrFail($id);

            $data = $request->validate([
                'author'  => 'required|string|max:255',
                'content' => 'required|string',
                'photo'   => 'nullable|image|max:2048',
            ]);

            $allowed         = '<p><a><strong><em><ul><ol><li><br>';
            $data['content'] = strip_tags($data['content'], $allowed);
            $data['content'] = preg_replace('#(<[^>]+?)on[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)#i', '$1', $data['content']);

            if($request->hasFile('photo')) {
                if($greeting->photo)
                    Storage::disk('public')->delete($greeting->photo);

                $path          = $request->file('photo')->store('photos', 'public');
                $data['photo'] = $path;
            }

            $greeting->update($data);

            return response()->json([
                'message' => 'Sambutan berhasil diperbarui.',
                'data'    => $greeting,
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data sambutan tidak ditemukan.'
            ], 404);
        } catch(\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui sambutan: '.$e->getMessage());
            
            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
