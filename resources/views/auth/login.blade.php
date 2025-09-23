<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <!-- Form login -->
    <div class="container mt-5" style="max-width: 400px;">
      <h2 class="mb-4 text-center">Login</h2>

      <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <!-- Error message -->
        @if($errors->any())
          <div class="alert alert-danger">
            {{ $errors->first() }}
          </div>
        @endif

        <!-- Email input -->
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}" required>
        </div>

        <!-- Password input with toggle show/hide -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">👁️</button>
          </div>
        </div>

        <!-- Remember me -->
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="check" name="remember">
          <label class="form-check-label" for="check">Remember me</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Show/Hide Password Script -->
    <script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');

      togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        togglePassword.textContent = type === 'password' ? '👁️' : '🙈';
      });
    </script>
  </body>
</html>
