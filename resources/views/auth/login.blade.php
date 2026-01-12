<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login BK</title>

<style>
/* ================= BODY & BACKGROUND ================= */
body {
    font-family: 'Inter', Arial, sans-serif;
    margin: 0;
    min-height: 100vh;

    background:
        linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
        url("{{ asset('image/background.jpeg') }}");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    display: flex;
    justify-content: center;
    align-items: center;
}

/* ================= ANIMASI UTAMA (SAMA PERSIS) ================= */
@keyframes riseUp {
    from {
        opacity: 0;
        transform: translateY(80px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* ================= CARD LOGIN ================= */
.card {
    background: rgba(255, 255, 255, 0.22);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 1.8rem;
    border: 1px solid rgba(255, 255, 255, 0.4);
    box-shadow: 0 25px 50px rgba(0,0,0,0.3);
    padding: 40px;
    width: 100%;
    max-width: 400px;
    animation: riseUp 1.1s cubic-bezier(.22,1,.36,1) forwards;
}

/* ================= TEXT ================= */
h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #00028b;
    font-weight: 800;
}

/* ================= INPUT ================= */
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 13px;
    margin-bottom: 15px;
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.15);
    outline: none;
    font-size: 15px;
}

input:focus {
    border-color: #2563eb;
}

/* ================= BUTTON ================= */
button {
    width: 100%;
    padding: 13px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: white;
    font-weight: 700;
    cursor: pointer;
    font-size: 15px;
    transition: transform 0.2s ease;
}

button:hover {
    transform: scale(1.03);
}

/* ================= ERROR ================= */
.alert-error {
    background: #fee2e2;
    color: #b91c1c;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    animation: fadeIn 0.4s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* ================= LINK ================= */
p {
    text-align: center;
    margin-top: 20px;
    color: #1f2937;
    font-weight: 600;
}

a {
    color: #2563eb;
    text-decoration: none;
    font-weight: 700;
}

a:hover {
    text-decoration: underline;
}
</style>
</head>

<body>

<div class="card">
    <h1>Login BK</h1>

    <form action="{{ route('login.post') }}" method="POST" autocomplete="off">
        @csrf

        <input type="email" name="email" placeholder="Email"
               value="{{ old('email') }}" required autocomplete="off">

        <!-- Anti autofill -->
        <input type="text" name="fakeuser" style="display:none">
        <input type="password" name="fakepass" style="display:none">

        <input type="password" name="password" placeholder="Password"
               required autocomplete="new-password">

        @if (session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
</div>

</body>
</html>
