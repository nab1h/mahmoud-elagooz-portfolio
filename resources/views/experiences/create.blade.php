@extends('layouts.dashboard')
@section('title', 'Add Experience')
@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h3>Add New Experience</h3>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('experiences.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="company" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}"
                        required placeholder="e.g., Google">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Job Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required
                        placeholder="e.g., Lead UI Designer">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ old('start_date') }}" required>
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date (Leave blank if currently working)</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add Experience</button>
                <a href="{{ route('experiences.index') }}" class="btn btn-secondary">Back to List</a>
            </form>
        </div>
    </div>
@endsection