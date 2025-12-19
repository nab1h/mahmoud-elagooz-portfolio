<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet"> -->
</head>
<style>
	/* ===== Body ===== */
/* ===== Body ===== */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #6c63ff, #00d4ff);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* ===== Container ===== */
.login-panel {
    background: #ffffff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 400px;
    text-align: center;
    box-sizing: border-box; /* مهم عشان padding ما يخرجش بره */
}

/* ===== Heading ===== */
.login-panel .panel-heading {
    font-size: 1.8rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 30px;
}

/* ===== Inputs ===== */
.login-panel input[type="text"],
.login-panel input[type="password"] {
    width: calc(100% - 30px); /* عشان يبقى جوه padding الكارت */
    padding: 12px 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1rem;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.login-panel input[type="text"]:focus,
.login-panel input[type="password"]:focus {
    border-color: #6c63ff;
    box-shadow: 0 0 8px rgba(108, 99, 255, 0.4);
    outline: none;
}

/* ===== Button ===== */
.login-panel button {
    width: calc(100% - 30px); /* جوه الكارت */
    padding: 14px;
    border: none;
    border-radius: 8px;
    background: #6c63ff;
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.login-panel button:hover {
    background: #574fd6;
}

/* ===== Error Message ===== */
.login-panel p {
    color: #ff4d4d;
    font-size: 0.95rem;
    margin-top: 10px;
}

/* ===== Responsive ===== */
@media (max-width: 480px) {
    .login-panel {
        padding: 30px 20px;
    }
    .login-panel .panel-heading {
        font-size: 1.5rem;
    }
    .login-panel input[type="text"],
    .login-panel input[type="password"],
    .login-panel button {
        width: calc(100% - 20px);
        padding: 12px;
    }
}

</style>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<input type="text" name="username" placeholder="Username" required>
						<br><br>

						<input type="password" name="password" placeholder="Password" required>
						<br><br>

						<button type="submit">Login</button>
					</form>

					@if($errors->any())
						<p style="color:red">{{ $errors->first() }}</p>
					@endif

				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


	<!-- <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
</body>

</html>