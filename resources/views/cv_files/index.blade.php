@extends('layouts.dashboard')
@section('title', 'Manage CV File Upload')

@section('content')
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h3>Upload Curriculum Vitae (PDF)</h3>
            <hr>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('cv_file.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="cv_file" class="form-label">Select CV File (PDF)</label>
                    <input type="file" class="form-control" id="cv_file" name="cv_file" required accept=".pdf">
                    
                    @error('cv_file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Upload File</button>
            </form>
            
            <hr>
            
            <h4>Current CV File:</h4>
            @if ($cvFile)
                <div class="alert alert-info d-flex justify-content-between align-items-center">
                    <p class="mb-0">
                        <i class="fa fa-file-pdf-o"></i> 
                        <strong>{{ $cvFile->display_name ?: $cvFile->file_name }}</strong>
                    </p>
                    <a href="{{ asset('storage/cv_files/' . $cvFile->file_name) }}" target="_blank" class="btn btn-sm btn-info">
                        View/Download
                    </a>
                </div>
            @else
                <div class="alert alert-warning">No CV file is currently uploaded.</div>
            @endif
        </div>
    </div>
@endsection