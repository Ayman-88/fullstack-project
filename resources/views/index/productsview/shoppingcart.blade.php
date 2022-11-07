<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>shopping cart</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/shoppingcart.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="header-container">
                    <div id="title">
                        <h2>shopping cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!count($cart))
    <div id="emptycartmessage">  
    <h4>looks like your cart is empty ! try adding something to your cart</h4>
    <a href="{{route('home')}}" class="btn btn-success">return home</a>
</div>
 
@endif
    @foreach ($cart as $c)
        @foreach ($c->product as $p)
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="body-container mt-4">
                            <div class="productimage"><img src="{{ asset('frontend/gallery/' . $p->image) }}"
                                    alt="" style="width:200px;height:200px"></div>
                            <div class="productname">
                                <h3>{{ $p->productname }}</h3>
                            </div>
                            <div class="productquantity">
                                <h5>quantity: {{ $p->quantity }}</h5>
                            </div>
                            <div class="productprice">
                                <h4>${{ $p->price }}</h4>
                            </div>
                            <div class="action">
                                <a title="return home" href="{{ route('home') }}" class="btn btn-primary mb-1"><i class="fas fa-house"></i></a>
                                <form action="{{ route('deleteshoppingcart', $c->id) }}" method="post">
                                    @csrf
                                    <button title="delete" type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</body>

</html>
