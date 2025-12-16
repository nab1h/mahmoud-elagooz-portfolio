@extends('layouts.dashboard')
@section('title', 'Manage Statistics')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Website Statistics Management</h2>
            <a href="{{ route('statistics.create') }}" class="btn btn-primary">Add New Statistic</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Value</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($statistics as $stat)
                        <tr>
                            <td>{{ $stat->id }}</td>
                            <td><strong>{{ $stat->title }}</strong></td>
                            <td>{{ $stat->value }}</td>
                            <td>{{ Str::limit($stat->description, 50) }}</td>
                            <td>
                                <a href="{{ route('statistics.edit', $stat->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('statistics.destroy', $stat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No statistics found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
<hr class="my-5"> 


<div class="container mt-5">
    <div class="row"></div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Customer Testimonials Management</h2>
        <a href="{{ route('testimonials.create') }}" class="btn btn-primary">Add New Testimonial</a>
    </div>

    {{-- رسالة النجاح الخاصة بـ Testimonials --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Job Title</th>
                    <th>Message</th>
                    <th>Favorite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->id }}</td>
                        <td><strong>{{ $testimonial->name }}</strong></td>
                        <td>{{ $testimonial->job_title ?: 'N/A' }}</td>
                        <td>{{ Str::limit($testimonial->message, 70) }}</td>
                        <td>
                            @if ($testimonial->is_favorite)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No testimonials found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection