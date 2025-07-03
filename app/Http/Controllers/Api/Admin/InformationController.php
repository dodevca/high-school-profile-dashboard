<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Information;

class InformationController extends Controller
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
            $information = Information::findOrFail($id);
            $data        = $request->validate([
                'name'            => 'required|string|max:255',
                'npsn'            => 'required|string|max:50',
                'nss'             => 'nullable|string|max:50',
                'education_level' => 'required|string|max:100',
                'address'         => 'required|string',
                'district'        => 'required|string|max:100',
                'city'            => 'required|string|max:100',
                'province'        => 'required|string|max:100',
                'postal_code'     => 'nullable|string|max:20',
                'phone'           => 'nullable|string|max:30',
                'email'           => 'nullable|email|max:150',
                'vision'          => 'required|string',
                'mission'         => 'required|string',
                'logo'            => 'nullable|image|max:2048',
            ]);

            if($request->hasFile('logo')) {
                if($information->logo)
                    Storage::disk('public')->delete($information->logo);

                $path         = $request->file('logo')->store('logo', 'public');
                $data['logo'] = $path;
            }

            $information->update($data);

            return response()->json([
                'message' => 'Informasi sekolah berhasil diperbarui.',
                'data'    => $information,
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data informasi tidak ditemukan.'
            ], 404);

        } catch(\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);

        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui informasi sekolah: '.$e->getMessage());
            
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
