@extends('layouts.dashboard')
@section('title', 'Projects')
@section('content')
  <div class="container mt-4">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3 ">
      <h4>Projects</h4>
      <form action="{{ route('projects.create') }}">
        <button class="btn btn-success"">
                                + Add Project
                              </button>
                              </form>
                            </div>
                          <br>
                          <br>
                              <div class=" row col-10 col-lg-11">
          <div class=" table-responsive ">
            <table class=" table table-bordered table-hover align-middle text-center">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Brand</th>
                  <th>logo Brand</th>
                  <th>Photos</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($projects as $project)
                        <tr>
                          <td>{{ $project->id }}</td>
                          <td>{{ $project->name }}</td>
                          <td>{{ $project->brand_name }}</td>
                          <td><img src="{{ asset('storage/' . $project->photo_brand) }}" class="img-fluid rounded"
                              alt="{{ $project->brand_name }}" width="60" height="60"></td>
                          <td>
                            <img src="{{ asset('storage/' . $project->photo_1) }}" class="img-fluid rounded"
                              alt="{{ $project->name }}" width="60" height="60">
                            <img src="{{ asset('storage/' . $project->photo_2) }}" class="img-fluid rounded"
                              alt="{{ $project->name }}" width="60" height="60">
                            <img src="{{ asset('storage/' . $project->photo_3) }}" class="img-fluid rounded"
                              alt="{{ $project->name }}" width="60" height="60">
                          </td>

                          <td>
                            {{ Str::limit($project->description, 100) }}
                          </td>

                          <td>{{ $project->created_at }}</td>

                          <td class="text-center" style="width: 200px;">

                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary btn-sm"
                              style="width: 80px; margin-right: 5px; float: left;">Edit</a>

                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                              style="width: 80px; float: left; margin-left: 5px;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('هل أنت متأكد من حذف هذا المشروع؟')">Delete</button>
                            </form>
                  </div>
                  <div style="clear: both;"></div>
                  </td>
                  </tr>
                @endforeach
          </tbody>
          </table>
    </div>
  </div>
  </div> <!--/.main-->
@endsection