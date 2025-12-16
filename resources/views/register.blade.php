<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Tambak Ikan Mina Jaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
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
            padding: 40px;
            
            overflow-y: auto; 
            height: 100vh; 
        }

        .login-left::-webkit-scrollbar {
            width: 8px;
        }
        .login-left::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

        .login-right {
            flex: 1;
            background: url('/images/bg-login.jpg') no-repeat center center;
            background-size: cover;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            text-align: center;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .logo h5 {
            font-weight: 700;
            color: #155e95;
            margin: 0;
            line-height: 1.2;
        }

        form {
            width: 100%;
            max-width: 400px;
        }

        h3 {
            font-weight: 700;
        }

        .login-btn {
            background-color: #155e95;
            color: #fff;
            border: none;
        }

        .login-btn:hover {
            background-color: #0f4c7a;
            color: #fff;
        }

        .create-account {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        @media (max-width: 992px) {
            .login-right {
                display: none;
            }
            .login-left {
                width: 100%;
                height: auto;
                min-height: 100vh;
            }
        }
    </style>
</head>

<body>

    <div class="login-page">
        <div class="login-left">
            <div class="logo mt-4"> <img src="/images/logo.png" alt="Logo">
                <h5>Tambak Ikan Mina<br>Jaya</h5>
            </div>

            <div class="text-center mb-4">
                <h3>Create Account 🚀</h3>
                <p class="text-muted">Lengkapi profil Anda untuk mendaftar.</p>
            </div>

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan Nama Lengkap" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email" value="{{ old('email') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label">No. Telepon</label>
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="08xxx" value="{{ old('phone') }}" required>
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ old('birthdate') }}" required>
                        @error('birthdate') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="2" placeholder="Masukan Alamat domisili..." required>{{ old('address') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Min 6 Karakter" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
    
                    <div class="col-md-6 mb-4">
                        <label class="form-label">Ulangi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi" required>
                    </div>
                </div>

                <button type="submit" class="btn login-btn w-100 py-2">Daftar & Simpan Profil</button>
            </form>

            <div class="create-account">
                <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}">Login disini</a></p>
            </div>
        </div>

        <div class="login-right"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>