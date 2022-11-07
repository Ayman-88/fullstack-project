<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            @if (count($products))
                @foreach ($products as $p)
                    <div class="col-lg-3">
                        <div class="sec3image">
                            <div class="image1">
                                <img src="{{ asset('frontend/gallery/' . $p->image) }} " alt="">
                                <div class="title">
                                    <h2>{{ $p->productname }}</h2>
                                </div>
                                <div class="price">
                                    <p>${{ $p->price }}</p>
                                </div>
                                <div class="overlay"></div>
                                <div class="show"><a href="{{ route('show.cart', $p->id) }}" target="blank"><i
                                            class="fas fa-eye"></i></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <span class="text-danger">no result(s) found</span>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('frontend/js/script.js') }}"></script> --}}
</body>
