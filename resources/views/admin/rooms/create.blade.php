@extends('layouts.admin')

@section('title', 'Add Room')

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

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group.full {
        grid-column: 1 / -1;
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
        display: inline-flex;
        align-items: center;
        justify-content: center;
        height: 44px;
        padding: 0 1.2rem;
        border-radius: 10px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        font-size: 1rem;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
    }

    .btn-secondary {
        background: #e5e7eb;
        color: #111827;
    }

    .error {
        color: #dc2626;
        margin-top: 0.35rem;
        font-size: 0.9rem;
    }

    .error-box {
        margin-bottom: 1rem;
        padding: 1rem;
        border-radius: 10px;
        background: #fee2e2;
        color: #991b1b;
    }
</style>

<div class="heading">
    <h1>Add Room</h1>
</div>

<div class="card form-card">
    @if ($errors->any())
        <div class="error-box">
            Please check the form fields below.
        </div>
    @endif

    <form method="POST" action="{{ route('admin.rooms.store') }}" enctype="multipart/form-data">
    @csrf

     
        <div class="form-grid">
            <div class="form-group full">
                <label for="room_name">Room Name</label>
                <input type="text" id="room_name" name="room_name" class="form-control" value="{{ old('room_name') }}">
                @error('room_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="theme_id">Theme</label>
                <select id="theme_id" name="theme_id" class="form-control">
                    <option value="">Select theme</option>
                    @foreach($themes as $theme)
                        <option value="{{ $theme->theme_id }}" {{ old('theme_id') == $theme->theme_id ? 'selected' : '' }}>
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
                    <option value="Easy" {{ old('difficulty_level') === 'Easy' ? 'selected' : '' }}>Easy</option>
                    <option value="Medium" {{ old('difficulty_level') === 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Hard" {{ old('difficulty_level') === 'Hard' ? 'selected' : '' }}>Hard</option>
                </select>
                @error('difficulty_level')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="duration_minutes">Duration Minutes</label>
                <input type="number" id="duration_minutes" name="duration_minutes" class="form-control" value="{{ old('duration_minutes') }}">
                @error('duration_minutes')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price_per_pax">Price Per Pax</label>
                <input type="number" step="0.01" id="price_per_pax" name="price_per_pax" class="form-control" value="{{ old('price_per_pax') }}">
                @error('price_per_pax')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="max_pax">Max Pax</label>
                <input type="number" id="max_pax" name="max_pax" class="form-control" value="{{ old('max_pax') }}">
                @error('max_pax')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group full">
               <label for="image">Room Image</label>
<input type="file" id="image" name="image" class="form-control" accept="image/*">
@error('image')
    <div class="error">{{ $message }}</div>
@enderror
           
            </div>

            <div class="form-group full">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create Room</button>
            <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection