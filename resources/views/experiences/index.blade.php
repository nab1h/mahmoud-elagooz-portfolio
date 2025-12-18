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
                    <hr class="my-5">
                </div>
            </div>
        </div>
        <hr class="my-5">
        <div class="row mt-5">
            <div class="col-lg-11 col-12">
                <h3>Awards Management</h3>
                @if (session('award_success'))
                    <div class="alert alert-success">{{ session('award_success') }}</div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Award</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('awards.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="name" class="form-label">Award Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}" required>
                                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="issuer" class="form-label">Issuer</label>

                                    <input type="text" class="form-control @error('issuer') is-invalid @enderror"
                                        id="issuer" name="issuer" value="{{ old('issuer') }}">

                                    @error('issuer')<div class="text-danger">{{ $message }}</div>@enderror

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                        name="date" value="{{ old('date') }}" required>
                                    @error('date')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Add Award</button>
                            <br>
                        </form>
                        <br>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Award Name</th>
                                <th>Issuer</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($awards as $award)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $award->name }}</td>
                                    <td>{{ $award->issuer ?: 'N/A' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($award->date)->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('awards.edit', $award->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('awards.destroy', $award->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this award?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No awards found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr class="my-5">
        <div class="row mt-5">
            <div class="col-12 col-lg-11 mx-auto">
                <h3>Skills Management</h3>
                @if (session('skill_success'))
                    <div class="alert alert-success">{{ session('skill_success') }}</div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Skill</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('skills.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-7 mb-3">
                                    <label for="skill_name" class="form-label">Skill Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="skill_name" name="name" value="{{ old('name') }}" required>
                                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="level" class="form-label">Level (0-100, Optional)</label>
                                    <input type="number" class="form-control @error('level') is-invalid @enderror"
                                        id="level" name="level" value="{{ old('level') }}" min="0" max="100">
                                    @error('level')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Add Skill</button>
                        </form>
                        <br>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Skill Name</th>
                                <th>Level</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($skills as $skill)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $skill->name }}</td>
                                    <td>{{ $skill->level !== null ? $skill->level . '%' : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('skills.destroy', $skill->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No skills found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection