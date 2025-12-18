@extends('layouts.dashboard')
@section('title', 'Links')
@section('content')
	@if ($errors->any())
		<div class="alert alert-danger" role="alert">
			<h5>⚠️ فشل التحقق من صحة البيانات:</h5>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="row">
		<div class="col-lg-12">
			<form action="{{ route('links.update') }}" method="POST">
				@csrf
				@method('PATCH')
				<h5 class="mb-3">Social Media Links</h5>
				<hr>
				@php
					function getLinkUrl($links, $name)
					{
						return $links->where('name', $name)->first()->url ?? '';
					}
				@endphp
				<div class="mb-4">
					<label for="facebook_url" class="form-label">Facebook URL</label>
					<div class="input-group">
						<input id="facebook_url" value="{{ getLinkUrl($links, 'facebook') }}" type="text"
							class="form-control" name="facebook_url" placeholder="https://facebook.com/username" />
					</div>
				</div>

				<div class="mb-4">
					<label for="twitter_url" class="form-label">Twitter URL</label>
					<div class="input-group">
						<input id="twitter_url" value="{{ getLinkUrl($links, 'twiter') }}" type="text" class="form-control"
							name="twitter_url" placeholder="https://twitter.com/username" />
					</div>
				</div>
				<br>
				<div class="mb-4">
					<label for="twitter_url" class="form-label">Instagram URL</label>
					<div class="input-group">
						<input id="instagram_url" value="{{ getLinkUrl($links, 'instagram') }}" type="text"
							class="form-control" name="instagram_url" placeholder="https://instagram.com/username" />
					</div>
				</div>
				<br>
				<div class="mb-4">
					<label for="pintrest_url" class="form-label">Pintrest URL</label>
					<div class="input-group">
						<input id="pintrest_url" value="{{ getLinkUrl($links, 'pintrest') }}" type="text"
							class="form-control" name="pintrest_url" placeholder="https://pintrest.com/username" />
					</div>
				</div>
				<br>
				<div class="mb-4">
					<label for="wepsite_url" class="form-label">Wepsite URL</label>
					<div class="input-group">
						<input id="wepsite_url" value="{{ getLinkUrl($links, 'wepsite') }}" type="text" class="form-control"
							name="wepsite_url" placeholder="https://wepsite.com/" />
					</div>
				</div>
				<br>
				<div class="mb-4">
					<label for="twitter_url" class="form-label">Linkedin URL</label>
					<div class="input-group">
						<input id="linkedin_url" value="{{ getLinkUrl($links, 'linkedin') }}" type="text"
							class="form-control" name="linkedin_url" placeholder="https://linkedin.com/username" />
					</div>
				</div>
				<br>
				<div class="mb-4">
					<label for="phone_url" class="form-label">Phone Number</label>
					<div class="input-group">
						<input id="phone_url" value="{{ getLinkUrl($links, 'phone') }}" type="text" class="form-control"
							name="phone_url" placeholder="your phone number" />
					</div>
				</div>
				<br>
				<div class="mt-5 d-grid">
					<button type="submit" class="btn btn-success btn-lg">Save All Links</button>
				</div>
			</form>
		</div>
	</div><!-- /.col-->
	<div class="col-sm-12">
		<p class="back-link">Nabih Alashmawy<a href="https://nabih-alashmawy.online">Nabih Alashmawy</a></p>
	</div>
	</div><!-- /.row -->
	</div><!--/.main-->
@endsection