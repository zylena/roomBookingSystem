<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Theme;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('theme')
            ->orderBy('room_id')
            ->get();

        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $themes = Theme::orderBy('theme_name')->get();

        return view('admin.rooms.create', compact('themes'));
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'theme_id' => ['required', 'exists:themes,theme_id'],
        'room_name' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'difficulty_level' => ['required', 'string', 'max:50'],
        'duration_minutes' => ['required', 'integer', 'min:1'],
        'price_per_pax' => ['required', 'numeric', 'min:0'],
        'max_pax' => ['required', 'integer', 'min:1'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        'status' => ['required', 'string', 'in:active,inactive'],
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('rooms', 'public');
        $validated['image_url'] = 'storage/' . $path;
    }

    unset($validated['image']);

    Room::create($validated);

    return redirect()
        ->route('admin.rooms.index')
        ->with('success', 'Room created successfully.');
}

    public function edit(Room $room)
    {
        $themes = Theme::orderBy('theme_name')->get();

        return view('admin.rooms.edit', compact('room', 'themes'));
    }

 public function update(Request $request, Room $room)
{
    $validated = $request->validate([
        'theme_id' => ['required', 'exists:themes,theme_id'],
        'room_name' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'difficulty_level' => ['required', 'string', 'max:50'],
        'duration_minutes' => ['required', 'integer', 'min:1'],
        'price_per_pax' => ['required', 'numeric', 'min:0'],
        'max_pax' => ['required', 'integer', 'min:1'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        'status' => ['required', 'string'],
    ]);

    if ($request->hasFile('image')) {
        if ($room->image_url && str_starts_with($room->image_url, 'storage/rooms/')) {
            $oldPath = str_replace('storage/', '', $room->image_url);

            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $path = $request->file('image')->store('rooms', 'public');
        $validated['image_url'] = 'storage/' . $path;
    }

    unset($validated['image']);

    $room->update($validated);

    return redirect()
        ->route('admin.rooms.index')
        ->with('success', 'Room updated successfully.');
}

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()
            ->route('admin.rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}