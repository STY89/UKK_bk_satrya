<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard BK</title>
    <style>
        /* Font modern dan reset */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(270deg, #6366f1, #a855f7, #ec4899);
            background-size: 600% 600%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Card utama */
        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            padding: 3rem;
            border-radius: 2rem;
            box-shadow: 0 25px 50px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 450px;
            width: 90%;
        }

        .card h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .card p {
            font-size: 1.1rem;
            color: #4b5563;
            margin-bottom: 2rem;
        }

        /* Tombol logout */
        .btn-logout {
            padding: 0.8rem 2rem;
            border-radius: 1rem;
            background-color: #ef4444;
            color: white;
            font-weight: 600;
            border: none;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #b91c1c;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>Selamat Datang di Dashboard BK</h1>
        <p>Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>

</body>
</html>
