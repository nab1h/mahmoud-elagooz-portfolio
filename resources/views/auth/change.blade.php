<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="password" name="old_password" placeholder="كلمة المرور القديمة" required>
    <br><br>

    <input type="password" name="new_password" placeholder="كلمة المرور الجديدة" required>
    <br><br>

    <input type="password" name="new_password_confirmation" placeholder="تأكيد كلمة المرور" required>
    <br><br>

    <button type="submit">تحديث كلمة المرور</button>
</form>

@if ($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
@endif

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif



	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>