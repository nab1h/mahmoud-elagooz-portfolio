@extends('layouts.dashboard')
@section('title', 'Linkes')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<form action="">
					<label for="facebook">facebook</label>
				<div class="input-group">
					<input id="btn-input" type="text" class="form-control input-md" name="facebook"
						placeholder="Type your message here..." /><span class="input-group-btn">
						<button class="btn btn-primary btn-md" id="btn-chat">Edit</button>
					</span>
				</div>
				<br>
					<label for="x">x</label>
				<div class="input-group">
					<input id="btn-input" type="text" class="form-control input-md" name="x"
						placeholder="Type your message here..." /><span class="input-group-btn">
						<button class="btn btn-primary btn-md" id="btn-chat">Edit</button>
					</span>
				</div>
				<br>
				<label for="instagram">instagram</label>
				<div class="input-group">
					<input id="btn-input" type="text" class="form-control input-md" name="instagram"
						placeholder="Type your message here..." /><span class="input-group-btn">
						<button class="btn btn-primary btn-md" id="btn-chat">Edit</button>
					</span>
				</div>
				<br>
				<label for="pintrest">pintrest</label>
				<div class="input-group">
					<input id="btn-input" type="text" class="form-control input-md" name="pintrest"
						placeholder="Type your message here..." /><span class="input-group-btn">
						<button class="btn btn-primary btn-md" id="btn-chat">Edit</button>
					</span>
				</div>
				<br>
				<label for="email">email</label>
				<div class="input-group">
					<input id="btn-input" type="text" class="form-control input-md" name="email"
						placeholder="Type your message here..." /><span class="input-group-btn">
						<button class="btn btn-primary btn-md" id="btn-chat">Edit</button>
					</span>
				</div>
			</form>
		</div>
	</div><!-- /.col-->
	<div class="col-sm-12">
		<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
	</div>
	</div><!-- /.row -->
	</div><!--/.main-->
@endsection