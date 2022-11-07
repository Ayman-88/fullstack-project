<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>
    <div class="container my-5 ">
        <div class="row">
            <form id="loginform" action="{{ route('login.user') }}" method="POST" autocomplete="off">
                @csrf
                <pre>
                    @if (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
                    @if (Session::has('fail'))
<div class="alert alert-danger">{{ Session::get('fail') }}</div>@endif

                <label for="email">email</label>
                <input type="email" value="{{ old('email') }}" title='please fill out this form'name="email" placeholder="enter your email">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                <label for="password">password</label>
                <input type="password" title='please fill out this form' name="password" placeholder="enter your password">
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                <input type="submit" value="login">
                <a id='registerlink' href="{{ route('registerPage') }}">register</a>
                </pre>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
