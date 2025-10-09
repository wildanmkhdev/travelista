<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Glassmorphism</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #334155 50%, #1e40af 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      overflow: hidden;
    }

    /* Background animated shapes */
    body::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 1px, transparent 1px);
      background-size: 50px 50px;
      animation: float 20s ease-in-out infinite;
      z-index: 1;
    }

    .background-shapes {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      pointer-events: none;
    }

    .shape {
      position: absolute;
      background: rgba(59, 130, 246, 0.15);
      border-radius: 50%;
      animation: floatShape 15s ease-in-out infinite;
    }

    .shape:nth-child(1) {
      width: 80px;
      height: 80px;
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .shape:nth-child(2) {
      width: 120px;
      height: 120px;
      top: 60%;
      right: 10%;
      animation-delay: 5s;
    }

    .shape:nth-child(3) {
      width: 60px;
      height: 60px;
      bottom: 20%;
      left: 20%;
      animation-delay: 10s;
    }

    .login-container {
      background: rgba(15, 23, 42, 0.4);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(59, 130, 246, 0.3);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 400px;
      position: relative;
      z-index: 10;
      transition: all 0.3s ease;
    }

    .login-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 45px rgba(0, 0, 0, 0.4);
    }

    .login-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .login-title {
      color: #e2e8f0;
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 10px;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    .login-subtitle {
      color: rgba(148, 163, 184, 0.9);
      font-size: 14px;
    }

    .form-group {
      margin-bottom: 25px;
      position: relative;
    }

    .form-input {
      width: 100%;
      padding: 15px 20px;
      background: rgba(15, 23, 42, 0.6);
      border: 1px solid rgba(59, 130, 246, 0.4);
      border-radius: 12px;
      color: #e2e8f0;
      font-size: 16px;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
      outline: none;
    }

    .form-input::placeholder {
      color: rgba(148, 163, 184, 0.7);
    }

    .form-input:focus {
      border-color: rgba(59, 130, 246, 0.8);
      background: rgba(15, 23, 42, 0.8);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
    }

    .password-toggle {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: rgba(148, 163, 184, 0.8);
      cursor: pointer;
      font-size: 18px;
      transition: color 0.3s ease;
    }

    .password-toggle:hover {
      color: #e2e8f0;
    }

    .login-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      font-size: 14px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      color: rgba(148, 163, 184, 0.9);
    }

    .remember-me input[type="checkbox"] {
      margin-right: 8px;
      accent-color: rgba(59, 130, 246, 0.8);
    }

    .forgot-password {
      color: rgba(59, 130, 246, 0.9);
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .forgot-password:hover {
      color: #3b82f6;
    }

    .login-button {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, rgba(59, 130, 246, 0.3), rgba(30, 64, 175, 0.4));
      border: 1px solid rgba(59, 130, 246, 0.5);
      border-radius: 12px;
      color: #e2e8f0;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
      position: relative;
      overflow: hidden;
    }

    .login-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), transparent);
      transition: left 0.5s ease;
    }

    .login-button:hover {
      background: linear-gradient(135deg, rgba(59, 130, 246, 0.5), rgba(30, 64, 175, 0.6));
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    }

    .login-button:hover::before {
      left: 100%;
    }

    .social-login {
      margin-top: 30px;
      text-align: center;
    }

    .social-divider {
      color: rgba(148, 163, 184, 0.7);
      margin-bottom: 20px;
      position: relative;
    }

    .social-divider::before,
    .social-divider::after {
      content: '';
      position: absolute;
      top: 50%;
      width: 40%;
      height: 1px;
      background: rgba(59, 130, 246, 0.4);
    }

    .social-divider::before {
      left: 0;
    }

    .social-divider::after {
      right: 0;
    }

    .social-buttons {
      display: flex;
      gap: 15px;
      justify-content: center;
    }

    .social-button {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-decoration: none;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }

    .social-button:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .signup-link {
      text-align: center;
      margin-top: 25px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 14px;
    }

    .signup-link a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .signup-link a:hover {
      text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    @keyframes float {

      0%,
      100% {
        transform: translate(0, 0) rotate(0deg);
      }

      33% {
        transform: translate(20px, -20px) rotate(120deg);
      }

      66% {
        transform: translate(-10px, 10px) rotate(240deg);
      }
    }

    @keyframes floatShape {

      0%,
      100% {
        transform: translateY(0) rotate(0deg);
      }

      50% {
        transform: translateY(-20px) rotate(180deg);
      }
    }

    @media (max-width: 480px) {
      .login-container {
        padding: 30px 25px;
        margin: 10px;
      }

      .login-title {
        font-size: 24px;
      }
    }
  </style>
</head>

<body>
  <div class="background-shapes">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

  <div class="login-container">
    <div class="login-header">
      <h1 class="login-title">Selamat Datang</h1>
      <p class="login-subtitle">Masuk ke akun Anda</p>
    </div>

    <form id="loginForm" method="post" action="proses-login.php">
      <div class="form-group">
        <input
          type="text"
          id="email"
          class="form-input"
          placeholder="username"
          name="username"
          required>
      </div>

      <div class="form-group">
        <input
          type="email"
          id="email"
          class="form-input"
          placeholder="Email"
          name="email"
          required>
      </div>

      <div class="form-group">
        <input
          type="password"
          id="password"
          class="form-input"
          placeholder="Password"
          name="password"
          required>
        <button type="button" class="password-toggle" onclick="togglePassword()">
          👁️
        </button>
      </div>

      <div class="login-options">
        <label class="remember-me">
          <input type="checkbox" id="remember">
          Ingat saya
        </label>
        <a href="#" class="forgot-password">Lupa password?</a>
      </div>

      <button type="submit" class="login-button" name="submit">
        Masuk
      </button>
    </form>

    <div class="social-login">
      <div class="social-divider">atau</div>
      <div class="social-buttons">
        <a href="#" class="social-button" title="Google">G</a>
        <a href="#" class="social-button" title="Facebook">f</a>
        <a href="#" class="social-button" title="Twitter">🐦</a>
      </div>
    </div>

    <div class="signup-link">
      Belum punya akun? <a href="#">Daftar sekarang</a>
    </div>
  </div>

  <!-- <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const toggleButton = document.querySelector('.password-toggle');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleButton.innerHTML = '🙈';
      } else {
        passwordInput.type = 'password';
        toggleButton.innerHTML = '👁️';
      }
    }

    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      if (email && password) {
        // Simulate login process
        const button = document.querySelector('.login-button');
        const originalText = button.innerHTML;
        button.innerHTML = 'Memproses...';
        button.disabled = true;

        setTimeout(() => {
          alert('Login berhasil! (Demo)');
          button.innerHTML = originalText;
          button.disabled = false;
        }, 2000);
      }
    });

    // Add floating animation to form inputs
    document.querySelectorAll('.form-input').forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateZ(10px)';
      });

      input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateZ(0)';
      });
    });

    // Add subtle parallax effect on mouse move
    document.addEventListener('mousemove', function(e) {
      const shapes = document.querySelectorAll('.shape');
      const mouseX = e.clientX / window.innerWidth;
      const mouseY = e.clientY / window.innerHeight;

      shapes.forEach((shape, index) => {
        const speed = (index + 1) * 0.02;
        const x = (mouseX - 0.5) * speed * 100;
        const y = (mouseY - 0.5) * speed * 100;
        shape.style.transform = `translate(${x}px, ${y}px)`;
      });
    });
  </script> -->

</body>

</html>