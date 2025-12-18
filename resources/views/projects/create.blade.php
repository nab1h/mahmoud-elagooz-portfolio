@extends('layouts.dashboard')
@section('title', 'create project')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Add New Portfolio Project</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="brand_name" class="form-label">Brand Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description and Key Results <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="5" required
                                    placeholder="Describe the work and the achieved results (e.g., 25% increase in engagement)."></textarea>
                            </div>
                            <hr class="my-4">
                            <h5 class="mb-3">Project Media</h5>
                            <div class="mb-3">
                                <label for="photo_brand" class="form-label">Brand Logo Image</label>
                                <input class="form-control" type="file" id="photo_brand" name="photo_brand">
                                <div class="form-text">Accepted formats: JPG, PNG, SVG (Optional).</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="photo_1" class="form-label">Project Photo 1</label>
                                    <input class="form-control" type="file" id="photo_1" name="photo_1">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="photo_2" class="form-label">Project Photo 2</label>
                                    <input class="form-control" type="file" id="photo_2" name="photo_2">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="photo_3" class="form-label">Project Photo 3</label>
                                    <input class="form-control" type="file" id="photo_3" name="photo_3">
                                </div>
                            </div>
                            <br>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Save Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!--/.main-->
@endsection