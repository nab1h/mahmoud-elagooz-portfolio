@extends('layouts.dashboard')
@section('title', 'Add Testimonial')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Add New Testimonial</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('testimonials.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Client Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="job_title" class="form-label">Job Title / Occupation (Optional)</label>
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title" value="{{ old('job_title') }}">
                                @error('job_title')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Testimonial Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="is_favorite" id="is_favorite" {{ old('is_favorite') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_favorite">
                                    Mark as Favorite (For front-end slider)
                                </label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Save Testimonial</button>
                                <a href="{{ route('statistics.index') }}" class="btn btn-secondary">Cancel / Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection