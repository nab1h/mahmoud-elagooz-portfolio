@extends('layouts.dashboard')
@section('title', 'Edit Project')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Edit Portfolio Project (ID: {{ $project->id }})</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $project->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="brand_name" class="form-label">Brand Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name"
                                    value="{{ old('brand_name', $project->brand_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description and Key Results <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="5" required
                                    placeholder="Describe the work and the achieved results...">{{ old('description', $project->description) }}</textarea>
                            </div>
                            <hr class="my-4">
                            <h5 class="mb-3">Project Media</h5>
                            <div class="mb-3">
                                <label for="photo_brand" class="form-label">Brand Logo Image</label>
                                @if($project->photo_brand)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $project->photo_brand) }}" class="img-thumbnail"
                                            alt="Current Logo" width="100">
                                    </div>
                                @endif
                                <br>
                                <input class="form-control" type="file" id="photo_brand" name="photo_brand">
                                <div class="form-text">Accepted formats: JPG, PNG, SVG (Optional).</div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="photo_1" class="form-label">Project Photo 1</label>
                                    @if($project->photo_1)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $project->photo_1) }}" class="img-thumbnail"
                                                alt="{{ $project->name }}" width="100" height="100">
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="photo_1" name="photo_1">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="photo_2" class="form-label">Project Photo 2</label>
                                    @if($project->photo_2)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $project->photo_2) }}" class="img-thumbnail"
                                                alt="{{ $project->name }}" width="100" height="100">
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="photo_2" name="photo_2">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="photo_2" class="form-label">Project Photo 3</label>
                                    @if($project->photo_3)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $project->photo_3) }}" class="img-thumbnail"
                                                alt="{{ $project->name }}" width="100" height="100">
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="photo_3" name="photo_3">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Save Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection