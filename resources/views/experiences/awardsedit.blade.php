@extends('layouts.dashboard')
@section('title', 'Edit Award')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Edit Award: {{ $award->name }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('awards.update', $award->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Award Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $award->name) }}" required>
                                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="issuer" class="form-label">Issuer</label>
                                <input type="text" class="form-control @error('issuer') is-invalid @enderror" id="issuer"
                                    name="issuer" value="{{ old('issuer', $award->issuer) }}">
                                @error('issuer')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                                    name="date" value="{{ old('date', $award->date) }}" required>
                                @error('date')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                <a href="{{ route('experiences.index') }}" class="btn btn-secondary">
                                    Cancel / Back to Awards List
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection