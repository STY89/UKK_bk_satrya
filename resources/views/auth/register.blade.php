<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register BK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #10b981, #22c55e);
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
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
        }
        input:focus {
            border-color: #10b981;
        }
        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #10b981;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: #047857;
        }
        p {
            text-align: center;
            margin-top: 20px;
            color: #4b5563;
        }
        a {
            color: #10b981;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Register BK</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </div>
</body>
</html>
