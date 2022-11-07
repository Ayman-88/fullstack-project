<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>
    <div class="container row my-5">
        <div class="col-lg-12">
            <form id="registerform" action="{{ route('register.user') }}" method="post" autocomplete="off">
                @csrf
                <pre>
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif

                    <label for="firstname">firstname</label>
                    <input type="text" value="{{ old('firstname') }}" title='please fill out this form'name="firstname" placeholder="firstname" autocomplete="off">
                    <span class="text-danger">@error('firstname'){{ $message }}@enderror</span>
                    <label for="lastname">lastname</label>
                    <input type="text" value="{{ old('lastname') }}" title='please fill out this form'name="lastname" placeholder="lastname" autocomplete="off">
                    <span class="text-danger">@error('lastname'){{ $message }}@enderror</span>
                    <label for="email">email</label>
                    <input type="email" value="{{ old('email') }}" title='please fill out this form'name="email" placeholder="email" autocomplete="off">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    <label for="password">password</label>
                    <input type="password" title='please fill out this form' name="password" placeholder=" password">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    <select name="role" id="">
                        <option value="administrator">administrator</option>
                        <option value="moderator">moderator</option>
                    </select>
                    <input type="submit" value="register">
                    <a id='loginlink' href="{{ route('loginPage') }} ">login</a>
                    </pre>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
