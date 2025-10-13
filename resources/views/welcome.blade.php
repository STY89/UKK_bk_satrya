<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK App</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(270deg, #6366f1, #a855f7, #ec4899);
            background-size: 600% 600%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            padding: 3rem;
            border-radius: 2rem;
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }

        .icon {
            width: 120px;
            margin: 0 auto 1.5rem;
            animation: bounce 2.5s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        h1 {
            font-size: 2.5rem;
            color: #1f2937;
            margin-bottom: 0.8rem;
        }

        p {
            color: #4b5563;
            margin-bottom: 2rem;
        }

        .btn {
            padding: 0.8rem 2rem;
            border-radius: 1rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            transition: all 0.3s ease-in-out;
            display: inline-block;
            margin: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-login { background-color: #3b82f6; }
        .btn-login:hover { background-color: #2563eb; transform: scale(1.05); }

        .btn-register { background-color: #10b981; }
        .btn-register:hover { background-color: #059669; transform: scale(1.05); }

        .btn-dashboard { background-color: #f59e0b; }
        .btn-dashboard:hover { background-color: #d97706; transform: scale(1.05); }

        .btn-logout { background-color: #ef4444; }
        .btn-logout:hover { background-color: #dc2626; transform: scale(1.05); }

        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        @media(max-width: 480px){
            h1 { font-size: 2rem; }
            .card { padding: 2rem; }
            .icon { width: 100px; }
        }
    </style>
</head>
<body>

    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/2900/2900766.png" alt="BK Icon" class="icon">
        <h1>Selamat Datang di BK App</h1>
        <p>Pantau pelanggaran dan perkembangan siswa dengan mudah dan cepat</p>

        {{-- Kalau BELUM login --}}
        @guest
            <div>
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn btn-register">Register</a>
            </div>
        @endguest

        {{-- Kalau SUDAH login --}}
        @auth
            <div>
                <p>Hai, {{ Auth::user()->name }} 👋</p>
                <a href="{{ route('dashboard') }}" class="btn btn-dashboard">Kembali ke Dashboard</a>

                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        @endauth

        <div class="footer">© 2025 BK App. Semua hak cipta dilindungi.</div>
    </div>

</body>
</html>
