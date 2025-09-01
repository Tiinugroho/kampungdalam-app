<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
    <meta name="author" content="AdminKit" />
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="{{ asset('adm/static/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <title>Sign In | AdminKit Demo</title>

    <link href="{{ asset('adm/static/css/app.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">

                            <h1 class="h2">
                                Welcome back,
                                {{ session('last_login_user') ?? 'User' }}
                            </h1>

                            <p class="lead">
                                Login untuk masuk ke Admin Panel
                            </p>

                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="{{ asset('Lambang_Kabupaten_Siak.png') }}" alt="Charles Hall"
                                            class="img-fluid" width="132" height="132" />
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf {{-- Email --}}
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" type="email" name="email"
                                                value="{{ old('email') }}"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                placeholder="Masukkan email Anda" required autofocus />
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- Password --}}
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input id="password" type="password" name="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                placeholder="Masukkan password Anda" required />
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        {{-- Remember Me --}}
                                        <div class="mb-3">
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <span class="form-check-label">Ingat saya</span>
                                            </label>
                                        </div>

                                        {{-- Submit --}}
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary w-100">
                                                Masuk
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="logout-timer" class="text-center mt-2 text-muted"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('adm/static/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        @endif
        @if (session('last_logout_time'))
            let lastLogout = new Date("{{ session('last_logout_time') }}").getTime();

            function updateTimer() {
                let now = new Date().getTime();
                let diff = now - lastLogout;

                let hours = Math.floor(diff / (1000 * 60 * 60));
                let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((diff % (1000 * 60)) / 1000);

                document.getElementById("logout-timer").innerHTML =
                    `Logout terakhir: ${hours} jam ${minutes} menit ${seconds} detik yang lalu`;
            }

            setInterval(updateTimer, 1000);
            updateTimer();
        @endif
    </script>

</body>

</html>
