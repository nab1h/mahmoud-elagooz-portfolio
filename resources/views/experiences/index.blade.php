@extends('layouts.dashboard')
@section('title', 'Cv')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 col-lg-11">
                <h3>Experience Management</h3>
                <p>
                    <a href="{{ route('experiences.create') }}" class="btn btn-success">
                        + Add New Experience
                    </a>
                </p>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>Job Title</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experiences as $experience)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $experience->company }}</td>
                                    <td>{{ $experience->title }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('Y/m') }} -
                                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y/m') : 'Current' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('experiences.edit', $experience->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>

                                        <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Upload CV File (PDF)</h4>
                        </div>
                        <div class="card-body">

                            @if (session('cv_success'))
                                <div class="alert alert-success">{{ session('cv_success') }}</div>
                            @endif

                            <form action="{{ route('cv_file.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="cv_file" class="form-label">Select CV File (PDF)</label>
                                    <input type="file" class="form-control" id="cv_file" name="cv_file" required
                                        accept=".pdf">

                                    @error('cv_file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Upload File</button>
                            </form>

                            <hr>
                            <br>
                            <h4>Current CV File:</h4>
@if ($cvFile)
    <div class="alert alert-info d-flex justify-content-between align-items-center">
        <p class="mb-0">
            <i class="fa fa-file-pdf-o"></i> 
            <strong>{{ $cvFile->display_name ?: $cvFile->file_name }}</strong>
        </p>
        
        <a href="{{ route('cv_file.download') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-download"></i> Download CV
        </a>
    </div>
@else
    <div class="alert alert-warning">No CV file is currently uploaded.</div>
@endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection