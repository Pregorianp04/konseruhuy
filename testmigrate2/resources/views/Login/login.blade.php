<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> --}}

</head>
<body>


    <!--- LOGIN  Area -->

    <div class="container" id="container">



        <div class="form-container sign-in-container">
            <form action="" method="POST">

                @csrf
                <h1>Sign in</h1>

                @if(session('success')=='Registrasi berhasil!')
                <div class="alert alert-success"> Registrasi Berhasil!</div>
                @endif

                @if($errors->any())<ul>
                @foreach ( $errors->all() as $items )
                <li>{{ $items }}</li>
                @endforeach
                </ul>
                @endif


                <span>or use your account</span>
                <input name="email" value="{{ old('email') }}"for="email" type="email" placeholder="Email" />
                <input name="password" for="password" type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>

        <!-- Area Perpindahan Sgn Up Sign IN-->
        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right">
                    <h1>Bergabunglah dengan kami!</h1>
                    <p>Daftar dan nikmati fitur lengkap aplikasi kami.</p>
                    <button class="ghost"><a href="{{ route('Login.register') }} ">Sign Up</a></button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>



</body>
</html>
