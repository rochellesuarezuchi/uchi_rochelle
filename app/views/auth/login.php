<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Font Awesome for eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* Body */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #013220, #014421);
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      margin: 0;
    }

    /* Login card */
    .login-card {
      background: #355E3B;
      padding: 2.5rem;
      border-radius: 1rem;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.6);
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .login-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 35px rgba(0,0,0,0.7);
    }

    /* Title */
    .login-title {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 2rem;
      color: #BCB88A;
      text-shadow: 0 1px 2px rgba(0,0,0,0.3);
    }

    /* Error message */
    .error-message {
      background: #8A9A5B;
      color: #013220;
      padding: 0.7rem;
      border-radius: 0.5rem;
      font-size: 0.95rem;
      margin-bottom: 1.5rem;
      border: 1px solid #BCB88A;
    }

    /* Form */
    .login-form {
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      text-align: left;
    }

    .form-group label {
      font-size: 1rem;
      font-weight: 600;
      color: #BCB88A;
      margin-bottom: 0.4rem;
    }

    /* Input wrappers */
    .input-wrapper,
    .password-wrapper {
      position: relative;
      display: flex;
      align-items: center;
      width: 100%;
    }

    .input-wrapper input,
    .password-wrapper input {
      width: 100%;
      padding: 0.65rem 0.8rem;
      border-radius: 0.5rem;
      border: 1px solid #8A9A5B;
      font-size: 1rem;
      outline: none;
      background: #E6ECD7;
      color: #013220;
      transition: border 0.3s, box-shadow 0.3s;
      box-sizing: border-box;
    }

    .input-wrapper input::placeholder,
    .password-wrapper input::placeholder {
      color: #355E3B;
      font-style: italic;
    }

    .input-wrapper input:focus,
    .password-wrapper input:focus {
      border-color: #BCB88A;
      box-shadow: 0 0 0 3px rgba(188,184,138,0.25);
    }

    /* Toggle password */
    .toggle-password {
      position: absolute;
      right: 12px;
      color: #355E3B;
      cursor: pointer;
      font-size: 1rem;
      transition: color 0.3s;
    }

    .toggle-password:hover {
      color: #BCB88A;
    }

    /* Button */
    .btn-login {
      background: #014421;
      color: #BCB88A;
      border: none;
      padding: 0.85rem;
      border-radius: 0.5rem;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
    }

    .btn-login:hover {
      background: #013220;
      transform: scale(1.03);
      box-shadow: 0 0 12px rgba(0,0,0,0.5);
    }

    /* Register link */
    .register-text {
      margin-top: 1.2rem;
      font-size: 0.95rem;
      color: #BCB88A;
    }

    .register-text a {
      color: #8A9A5B;
      font-weight: 600;
      text-decoration: none;
    }

    .register-text a:hover {
      text-decoration: underline;
      color: #BCB88A;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h2 class="login-title">Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>" class="login-form">
      <!-- Username -->
      <div class="form-group">
        <label for="username">Username</label>
        <div class="input-wrapper">
          <input type="text" name="username" id="username" placeholder="Enter your username" required>
        </div>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password">Password</label>
        <div class="password-wrapper">
          <input type="password" name="password" id="password" placeholder="Enter your password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>
      </div>

      <button type="submit" class="btn-login">Login</button>
    </form>

    <p class="register-text">
      Don’t have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
    </p>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
