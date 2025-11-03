<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Tambak Ikan Mina Jaya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      overflow: hidden;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-page {
      display: flex;
      height: 100vh;
      width: 100%;
    }
    .login-left {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #fff;
    }
    .login-right {
      flex: 1;
      background: url('/images/bg-login.jpg') no-repeat center center;
      background-size: cover;
    }
    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 35px;
      text-align: center;
    }
    .logo img {
      width: 50px;
      height: 50px;
      margin-right: 10px;
    }
    .logo h5 {
      font-weight: 700;
      color: #0d6efd;
      margin: 0;
      line-height: 1.2;
    }
    form {
      width: 100%;
      max-width: 380px;
    }
    h3 {
      font-weight: 700;
    }
    .login-btn {
      background-color: #0d6efd;
      color: #fff;
      border: none;
    }
    .login-btn:hover {
      background-color: #0b5ed7;
    }
    .forgot-password {
      font-size: 0.9rem;
      color: red;
      text-decoration: none;
    }
    .forgot-password:hover {
      text-decoration: underline;
    }
    .create-account {
      text-align: center;
      margin-top: 15px;
    }
    @media (max-width: 992px) {
      .login-page {
        flex-direction: column;
      }
      .login-right {
        height: 40vh;
      }
      .login-left {
        height: 60vh;
        padding: 40px 30px;
      }
    }
  </style>
</head>
<body>

  <div class="login-page">
    <div class="login-left">
      <div class="logo">
        <img src="/images/logo.png" alt="Logo">
        <h5>Tambak Ikan Mina<br>Jaya</h5>
      </div>

      <div class="text-center mb-4">
        <h3>Welcome Back 👋</h3>
        <p class="text-muted mb-4">Welcome, Please Enter Your Details.</p>
      </div>

      <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember me</label>
          </div>
          <a href="#" class="forgot-password">Forgot Password?</a>
        </div>

        <button type="submit" class="btn login-btn w-100 py-2">Masuk</button>
      </form>

      <div class="create-account">
        <p class="mb-0">Don’t have account yet? <a href="#">Create Account</a></p>
      </div>
    </div>

    <div class="login-right"></div>
  </div>

</body>
</html>
