@extends('layouts.dashboard')
@section('title', 'Edit Skill')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Edit Skill: {{ $skill->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('skills.update', $skill->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Skill Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $skill->name) }}" required>
                                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label for="level" class="form-label">Level (0-100, Optional)</label>
                                <input type="number" class="form-control @error('level') is-invalid @enderror" id="level"
                                    name="level" value="{{ old('level', $skill->level) }}" min="0" max="100">
                                @error('level')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                <a href="{{ route('experiences.index') }}" class="btn btn-secondary">
                                    Cancel / Back to Skills List
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection