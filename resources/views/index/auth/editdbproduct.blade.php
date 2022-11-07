<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/editdbproduct.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <title>dashboard</title>
</head>

<body>
    @foreach ($product as $p)
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form id="editProduct" class="d-flex" action="{{ route('edit-product',$p->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('put')
                        <label for="category">category</label>
                        <select name="category_id" id="" title='enter category name'>
                            @foreach ($p->category as $c)
                                <option value='{{ $c->id }}'> {{ $c->category_name }}</option>
                            @endforeach

                            @foreach ($category as $cat)
                            @if ($c->category_name != $cat->category_name)
                            <option value='{{ $cat->id }}'> {{ $cat->category_name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text text-danger"></span>
                        @enderror <br>
                        <label for="brand">brand</label>
                        <select name="brand_id" id="" title='enter brand name'>
                            @foreach ($p->brand as $b)
                                <option value='{{ $b->id }}'>{{ $b->brand_name }}</option>
                            @endforeach
                        </select>
                        @error('brand')
                            <span class="text text-danger"></span>
                        @enderror <br>
                        <label for="productname">productname</label>
                        <input type="text" value="{{ $p->productname }}" name='productname'
                            placeholder='enter product name' title='enter product name' required>
                        @error('productname')
                            <span class="text text-danger"></span>
                        @enderror <br>
                        <label for="desc">productdescription</label>
                        <input type="text" value="{{ $p->desc }}" name='desc'
                            placeholder='enter product description' title='enter product description' required>
                        @error('desc')
                            <span class="text text-danger"></span>
                        @enderror <br>
                        <label for="pricebefore">pricebefore</label>
                        <input type="number" min="1" value="{{ $p->pricebefore }}" name='pricebefore'
                            placeholder='enter price before' title='enter price before'>
                        <label for="price">price</label>
                        <input type="number" min="1" value="{{ $p->price }}" name='price'
                            placeholder='enter product price' title='enter product price' required>
                        @error('price')
                            <span class="text text-danger"></span>
                        @enderror <br>
                        <label for="quantity">quantity</label>
                        <input type="text" name='quantity' value="{{ $p->quantity }}"
                            placeholder='enter product quantity' title='enter product quantity' required>
                        @error('quantity')
                            <span class="text text-danger"></span>
                        @enderror <br>
                        <div id="image">
                            <label for="image">image</label><br>
                            <input type="file" name='image' placeholder='upload product image'
                                title='upload product image' required>
                            @error('image')
                                <span class="text text-danger"></span>
                            @enderror
                        </div>

                        <div class="form-btn mt-4">
                            <button id="btn1" type="submit" class="btn btn-warning"><i
                                    class="fas fa-check"></i></button>
                            <a id="btn2" class="btn btn-success" href="{{ route('dashboard.page') }}"><i
                                    class="fas fa-x"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('frontend/js/editdbproduct.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
