<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search                      = $request->input('search');
        $sort                        = $request->input('sort', 'start_time|asc');
        $page                        = (int) $request->input('page', 1);
        $perPage                     = (int) $request->input('perPage', 10);
        $type                        = $request->input('type');
        [$sortField, $sortDirection] = explode('|', $sort) + [1 => 'asc'];
        $query                       = Event::query();
        
        if($search)
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        
        if($type)
            $query->where('type', $type);

        $query->orderBy($sortField, $sortDirection);

        $paginated = $query->paginate(
            $perPage,
            ['*'],
            'page',
            $page
        );

        $paginated->getCollection()->transform(function(Event $event) {
            return [
                'id'          => $event->id,
                'title'       => $event->title,
                'description' => strlen($event->description) > 100 ? substr($event->description, 0, 100) . '...' : $event->description,
                'start_time'  => Carbon::parse($event->start_time)->format('d-m-Y H:i'),
                'end_time'    => Carbon::parse($event->end_time)->format('d-m-Y H:i'),
                'location'    => $event->location,
                'image'       => $event->image,
                'type'        => $event->type,
                'created_at'  => $event->created_at ? $event->created_at->format('d-m-Y') : null,
            ];
        });

        return response()->json($paginated);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $startDate = $request->input('start_date');
            $startTime = $request->input('start_time');
            $endDate   = $request->input('end_date');
            $endTime   = $request->input('end_time');
    
            $request->merge([
                'start_time' => "{$startDate} {$startTime}",
                'end_time'   => "{$endDate} {$endTime}",
            ]);
            
            $data = $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'start_time'  => 'required|date',
                'end_time'    => 'required|date|after_or_equal:start_time',
                'location'    => 'required|string|max:255',
                'type'        => 'required|string|max:100',
                'image'       => 'nullable|image|max:2048',
            ]);

            $data['active'] = true;

            if($request->hasFile('image')) {
                $data['image'] = $request->file('image')
                    ->store('event', 'public');
            }

            $event = Event::create($data);

            return response()->json([
                'message' => 'Agenda berhasil dibuat.',
                'data'    => $event,
            ], 201);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data agenda tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat membuat agenda: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
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
            $event     = Event::findOrFail($id);
            $startDate = $request->input('start_date');
            $startTime = $request->input('start_time');
            $endDate   = $request->input('end_date');
            $endTime   = $request->input('end_time');
    
            $request->merge([
                'start_time' => "{$startDate} {$startTime}",
                'end_time'   => "{$endDate} {$endTime}",
            ]);

            $data = $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'start_time'  => 'required|date',
                'end_time'    => 'required|date|after_or_equal:start_time',
                'location'    => 'required|string|max:255',
                'type'        => 'required|string|max:100',
                'image'       => 'nullable|image|max:2048',
            ]);

            $data['active'] = true;

            if($request->hasFile('image')) {
                if($event->image)
                    Storage::disk('public')->delete($event->image);
                
                $data['image'] = $request->file('image')
                    ->store('event', 'public');
            }

            $event->update($data);

            return response()->json([
                'message' => 'Agenda berhasil diperbarui.',
                'data'    => $event,
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data agenda tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat memperbarui agenda: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $event = Event::findOrFail($id);

            if($event->image)
                Storage::disk('public')->delete($event->image);

            $event->delete();

            return response()->json([
                'message' => 'Agenda berhasil dihapus.',
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Data agenda tidak ditemukan.'
            ], 404);
        } catch(ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        } catch(\Exception $e) {
            Log::error('Terjadi kesalahan saat menghapus agenda: '.$e->getMessage());

            return response()->json([
                'error' => 'Terjadi kesalahan tak terduga. Coba lagi nanti.',
            ], 500);
        }
    }
}
