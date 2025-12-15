@extends('layouts.dashboard')
@section('title', 'Cv')
@section('content')
	<div class="col-lg-4">
		<div class="section-title">
			<h4>| Experience</h4>
		</div>
		<div class="resume-item-wrap">
			@foreach ($experiences as $experience)
				<div class="resume-item">
					<h6 class="date">
						{{ \Carbon\Carbon::parse($experience->start_date)->format('Y') }}
						-
						{{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y') : 'Current' }}
					</h6>
					<h5 class="job-title">{{ $experience->title }}</h5>
					<h6 class="company">{{ $experience->company }}</h6>
				</div>
			@endforeach
		</div>
	</div>
	</div><!--/.main-->
@endsection