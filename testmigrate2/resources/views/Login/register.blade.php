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


    <!--- Registrasi/Sign up  Area -->

    <div class="container" id="container">

        <!-- LOGIN AREA -->
        <div class="form-container sign-in-container">
            <form action="" method="POST">

                @csrf
                <h1>Sign Up</h1>

                @if(session('success')=='Registrasi berhasil!')
                <div class="alert alert-success"> Registrasi Berhasil!</div>
                @endif
                @if($errors->any())

                <ul>
                @foreach ( $errors->all() as $items )

                    <li>{{ $items }}</li>
                    @endforeach
                </ul>

            @endif


            <input name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" placeholder="Name" />
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" placeholder="Email" />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <input name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" />
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
                <button>Sign Up</button>
            </form>
        </div>

        <!-- Area Perpindahan Sgn Up Sign IN-->
        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" > <a href="{{ route('login') }}">Sign In</a></button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>



</body>
</html>
