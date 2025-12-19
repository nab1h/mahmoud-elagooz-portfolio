<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6c63ff, #00d4ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-panel {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-sizing: border-box;
        }

        .panel-heading {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
            box-sizing: border-box;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.4);
        }

        .form-group label {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        .form-group input:focus+label,
        .form-group input:not(:placeholder-shown)+label {
            top: -8px;
            left: 10px;
            font-size: 0.8rem;
            background: #fff;
            padding: 0 4px;
            color: #6c63ff;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #6c63ff;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #574fd6;
        }

        .error {
            color: #ff4d4d;
            margin-top: 10px;
        }

        .success {
            color: #28a745;
            margin-top: 10px;
        }

        @media (max-width: 480px) {
            .login-panel {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-panel">
        <div class="panel-heading">Change Password</div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="form-group">
                <input type="password" name="old_password" placeholder=" " required>
                <label>Old Password</label>
            </div>

            <div class="form-group">
                <input type="password" name="new_password" placeholder=" " required>
                <label>New Password</label>
            </div>

            <div class="form-group">
                <input type="password" name="new_password_confirmation" placeholder=" " required>
                <label>Confirm New Password</label>
            </div>

            <button type="submit">Update Password</button>
        </form>

        @if ($errors->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
    </div>
</body>

</html>
