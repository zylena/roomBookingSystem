@extends('layouts.admin')

@section('title', 'Edit Room')

@section('content')
<style>
    .form-card {
    max-width: 850px;
    margin: 0 auto;
    padding: 2rem;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.2rem;
}

.form-group.full {
    grid-column: 1 / -1;
}

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.45rem;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        font-size: 1rem;
    }

    .form-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 1.5rem;
    }

    .btn {
        padding: 0.65rem 1rem;
        border-radius: 10px;
        border: none;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #111827;
    }

    .btn-danger {
        background: #dc2626;
        color: white;
    }

    .error {
        color: #dc2626;
        margin-top: 0.35rem;
        font-size: 0.9rem;
    }
</style>

<div class="heading">
    <h1>Edit Room</h1>
</div>

<div class="card form-card">
  <form method="POST" action="{{ route('admin.rooms.update', $room->room_id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-grid">
        <div class="form-group full">
            <label for="room_name">Room Name</label>
            <input type="text" id="room_name" name="room_name" class="form-control" value="{{ old('room_name', $room->room_name) }}">
            @error('room_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="theme_id">Theme</label>
            <select id="theme_id" name="theme_id" class="form-control">
                <option value="">Select theme</option>
                @foreach($themes as $theme)
                    <option value="{{ $theme->theme_id }}" {{ old('theme_id', $room->theme_id) == $theme->theme_id ? 'selected' : '' }}>
                        {{ $theme->theme_name }}
                    </option>
                @endforeach
            </select>
            @error('theme_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="difficulty_level">Difficulty Level</label>
            <select id="difficulty_level" name="difficulty_level" class="form-control">
                <option value="">Select difficulty</option>
                <option value="Easy" {{ old('difficulty_level', $room->difficulty_level) === 'Easy' ? 'selected' : '' }}>Easy</option>
                <option value="Medium" {{ old('difficulty_level', $room->difficulty_level) === 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Hard" {{ old('difficulty_level', $room->difficulty_level) === 'Hard' ? 'selected' : '' }}>Hard</option>
            </select>
            @error('difficulty_level')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="duration_minutes">Duration Minutes</label>
            <input type="number" id="duration_minutes" name="duration_minutes" class="form-control" value="{{ old('duration_minutes', $room->duration_minutes) }}">
            @error('duration_minutes')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price_per_pax">Price Per Pax</label>
            <input type="number" step="0.01" id="price_per_pax" name="price_per_pax" class="form-control" value="{{ old('price_per_pax', $room->price_per_pax) }}">
            @error('price_per_pax')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="max_pax">Max Pax</label>
            <input type="number" id="max_pax" name="max_pax" class="form-control" value="{{ old('max_pax', $room->max_pax) }}">
            @error('max_pax')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="active" {{ old('status', $room->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $room->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group full">
            <label for="image">Room Image</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">

            @if($room->image_url)
                <div style="margin-top: 1rem;">
                    <img src="{{ asset($room->image_url) }}" alt="{{ $room->room_name }}" style="width: 180px; height: 120px; object-fit: cover; border-radius: 10px;">
                </div>
            @endif

            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group full">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5">{{ old('description', $room->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update Room</button>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

    
</div>
@endsection