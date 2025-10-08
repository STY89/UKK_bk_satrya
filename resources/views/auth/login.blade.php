<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login BK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4f46e5, #3b82f6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #1f2937;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 15px;
        }
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4f46e5;
        }
        .alert-error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 8px;
            margin-top: -5px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #4f46e5;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: #3730a3;
        }
        p {
            text-align: center;
            margin-top: 20px;
            color: #4b5563;
        }
        a {
            color: #4f46e5;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Login BK</h1>

        <form action="{{ route('login') }}" method="POST" id="loginForm">
            @csrf
            <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" id="password" name="password" placeholder="Password" required>

            {{-- ✅ Pesan error --}}
            @if (session('error'))
                <div class="alert-error" id="errorMsg">{{ session('error') }}</div>
            @endif

            @error('password')
                <div class="alert-error" id="errorMsg">{{ $message }}</div>
            @enderror

            <button type="submit">Login</button>
        </form>

        <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
    </div>

    <script>
        // ✅ Kosongkan field email & password kalau login gagal
        @if (session('error'))
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
        @endif
    </script>
</body>
</html>
