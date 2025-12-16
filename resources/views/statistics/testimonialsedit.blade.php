@extends('layouts.dashboard')
@section('title', 'Edit Testimonial')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        {{-- 🛑 1. تصحيح العنوان لاستخدام $testimonial 🛑 --}}
                        <h3 class="mb-0">Edit Testimonial: {{ $testimonial->name }}</h3>
                    </div>
                    <div class="card-body">
                        {{-- 🛑 2. تصحيح مسار الإرسال لاستخدام testimonials.update والمتغير $testimonial->id 🛑 --}}
                        <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Client Name</label>
                                {{-- 🛑 3. تصحيح الحقول لاستخدام $testimonial->name 🛑 --}}
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" 
                                       value="{{ old('name', $testimonial->name) }}" required>
                                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="job_title" class="form-label">Job Title / Occupation (Optional)</label>
                                {{-- 🛑 4. إضافة حقل Job Title 🛑 --}}
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror" 
                                       id="job_title" name="job_title" 
                                       value="{{ old('job_title', $testimonial->job_title) }}">
                                @error('job_title')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Testimonial Message</label>
                                {{-- 🛑 5. تصحيح حقل الرسالة لاستخدام $testimonial->message 🛑 --}}
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" required>{{ old('message', $testimonial->message) }}</textarea>
                                @error('message')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="is_favorite" id="is_favorite" 
                                       {{-- 🛑 6. إضافة حقل is_favorite 🛑 --}}
                                       @if(old('is_favorite') || $testimonial->is_favorite) checked @endif>
                                <label class="form-check-label" for="is_favorite">
                                    Mark as Favorite (For front-end slider)
                                </label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                <a href="{{ route('statistics.index') }}" class="btn btn-secondary">Cancel / Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection