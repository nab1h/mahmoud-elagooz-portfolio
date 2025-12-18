@extends('layouts.dashboard')
@section('title', 'General Content Settings')
@section('content')
    <div class="container">
        <div class="row col-12 col-lg-11">
            <div class="col-md-10 mx-auto">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Content Management</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('settings.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="home" class="form-label fw-bold">1. Home Page Content</label>
                                <textarea class="form-control" id="home" name="home"
                                    rows="4">@isset($settings['home']){{ $settings['home'] }}@endisset</textarea>
                                <small class="form-text text-muted">The main text displayed on the Home page.</small>
                                @error('home')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <hr>
                            <div class="mb-4">
                                <label for="about" class="form-label fw-bold">2. About Page Content</label>
                                <textarea class="form-control" id="about" name="about"
                                    rows="6">@isset($settings['about']){{ $settings['about'] }}@endisset</textarea>
                                <small class="form-text text-muted">The main text/biography on the About Us page.</small>
                                @error('about')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <hr>
                            <div class="mb-4">
                                <label for="footer" class="form-label fw-bold">3. Footer Content (Address/Text)</label>
                                <textarea class="form-control" id="footer" name="footer"
                                    rows="3">@isset($settings['footer']){{ $settings['footer'] }}@endisset</textarea>
                                <small class="form-text text-muted">The main text/address displayed in the footer.</small>
                                @error('footer')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success btn-lg">Update Content</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection