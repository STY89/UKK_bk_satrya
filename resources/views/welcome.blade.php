<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BK App - SMK Antartika 1</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
/* ================= BODY & BACKGROUND ================= */
body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    padding: 20px;
    min-height: 100vh;
    background:
        linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
        url("{{ asset('image/background.jpeg') }}");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;

    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 25px;
}

/* ================= LOGO ================= */
.logo-bg-topleft {
    position: fixed;
    top: 12px;
    left: 12px;
    width: 70px;
    z-index: 10;
    filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
}

/* ================= CARD ================= */
.card {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-radius: 2rem;
    border: 1px solid rgba(255, 255, 255, 0.4);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    padding: 2.5rem;
    width: 100%;
    max-width: 550px;
    text-align: center;
}

/* ================= CARD WIDE ================= */
.card-wide {
    max-width: 1100px;
    width: 95%;
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 25px;
    text-align: left;
}

/* ================= TEXT BOX ================= */
.text-box {
    background: rgba(255, 255, 255, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-radius: 18px;
    padding: 20px 25px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.text-box h1 {
    margin-bottom: 12px;
    color: #00028b;
    font-weight: 800;
    font-size: 1.8rem;
}

.text-box p,
.text-box ul {
    color: #111827;
    font-size: 1.05rem;
    line-height: 1.7;
}

/* ================= BUTTON ================= */
.btn-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 1.2rem;
    flex-wrap: wrap;
}

.btn {
    padding: 1rem 2.3rem;
    border-radius: 1.2rem;
    font-weight: 700;
    color: white;
    text-decoration: none;
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    transition: transform 0.3s ease;
}

.btn:hover {
    transform: scale(1.07);
}

.btn-login {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
}

.btn-register {
    background: linear-gradient(135deg, #10b981, #059669);
}

.btn-dashboard {
    background: linear-gradient(135deg, #8b5cf6, #6d28d9);
}

.btn-logout {
    background: linear-gradient(135deg, #ef4444, #b91c1c);
}

/* ================= FOOTER ================= */
.footer {
    margin-top: 1.5rem;
    font-size: 0.9rem;
    color: #00028b;
    font-weight: 700;
}

/* ================= ANIMASI ================= */
@keyframes slideUpFade {
    from {
        opacity: 0;
        transform: translateY(60px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-welcome {
    opacity: 0;
    animation: slideUpFade 0.9s ease-out forwards;
}

.animate-bk {
    opacity: 0;
    animation: slideUpFade 0.9s ease-out forwards;
    animation-delay: 0.35s;
}

/* ================= RESPONSIVE ================= */
@media (max-width: 900px) {
    .card-wide {
        grid-template-columns: 1fr;
        max-width: 550px;
    }
}
</style>
</head>
<body>

<img src="{{ asset('image/ini new logo antrek 1.png') }}" class="logo-bg-topleft" alt="Logo Sekolah">

<!-- CARD WELCOME -->
<div class="card animate-welcome">
    <div class="text-box" style="text-align:center;">
        <h1>Selamat Datang di BK App</h1>
        <p>
            Pantau perilaku siswa dan lakukan bimbingan konseling secara profesional
            di SMK Antartika 1 Sidoarjo.
        </p>
    </div>

    <!-- JIKA BELUM LOGIN -->
    @guest
    <div class="btn-container">
        <a href="{{ route('login') }}" class="btn btn-login">Login</a>
        <a href="{{ route('register') }}" class="btn btn-register">Register</a>
    </div>
    @endguest

    <!-- JIKA SUDAH LOGIN -->
    @auth
    <div class="btn-container">
        <a href="{{ route('dashboard') }}" class="btn btn-dashboard">
            Masuk Dashboard
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-logout">
                Logout
            </button>
        </form>
    </div>
    @endauth

    <div class="footer">
        Website ini dikelola oleh Guru BK / Admin
    </div>
</div>

<!-- CARD BK -->
<div class="card card-wide animate-bk">
    <div class="text-box">
        <h1>Apa itu BK?</h1>
        <p>
            Bimbingan Konseling (BK) adalah layanan profesional yang membantu siswa
            dalam menghadapi masalah pribadi, sosial, belajar, dan karier agar
            berkembang secara optimal.
        </p>
    </div>

    <div class="text-box">
        <h1>Pentingnya BK</h1>
        <ul style="padding-left: 1.2rem;">
            <li>Mengenali potensi dan bakat siswa</li>
            <li>Mendukung masalah belajar & sosial</li>
            <li>Mencegah konflik dan perilaku negatif</li>
            <li>Meningkatkan kesehatan mental siswa</li>
            <li>Membantu perencanaan karier</li>
        </ul>
    </div>
</div>

</body>
</html>
