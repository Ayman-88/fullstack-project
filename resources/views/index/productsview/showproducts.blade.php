@include('index.layouts.header')
 
      
  <title>@yield('title',$product->productname)</title>
  

@include('index.layouts.headerclose')

<div class="container-fluid">
 
    <div class="row">
        <div class="col-12">
            <div class="product">
                <div class="image">
                    <img  src="{{asset('frontend/gallery/'.$product->image) }}" alt="">
                </div>
                <div class="category">
                    <h6 >{{ $category->category_name }}</h6>
                </div>
                <div class="brand"><h4 ></h4></div>
                    <div class="productname">
                        <span>product name:</span>
                       <h3 class="proname">{{ $product->productname }}</h3>
                    </div>
                <div class="price">
                    <div class="price-container d-flex justify-content-center">
                    <span for="price">price:</span>
                    @if ($product->pricebefore )
                    <p class="before">${{ $product->pricebefore }}</p><br>
                    @endif
                    <p  class="after">${{ $product->price }}</p>
                </div>
                </div>
                <div class="desc">
                    <legend>description:</legend>
                    <p>{{ $product->desc }}</p>
                </div>
                <form action="{{ route('add-to-cart') }}" method="post">
                    @csrf
                <div class="quantity">
                    <label for="quantity">select quantity</label><br>
                    <select name="quantity" id="">
                        <option value="1">Qty:1</option>
                        <option value="2">Qty:2</option>
                        <option value="3">Qty:3</option>
                        <option value="4">Qty:4</option>
                        <option value="5">Qty:5</option>
                        <option value="6">Qty:6</option>
                        <option value="7">Qty:7</option>
                        <option value="8">Qty:8</option>
                        <option value="9">Qty:9</option>
                        <option value="10">Qty:10</option>
                    </select>
                </div>
                <div class="shop">
                    <input type="hidden" value="{{$product->id }}" name='product_id' >
                    <input type="hidden" value="{{$product->category_id }}" name='category_id' >
                    <input type="hidden" value="{{ $product->brand_id }}" name='brand_id' >
                    <input type="hidden" value="{{ Session::get('loginId') }}" name='user_id' >
                    <button id="addtocart" type="submit" class="btn btn-primary btn-lg mt-2">add to cart</button><br>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('frontend/js/products.js') }}"></script>
@include('index.layouts.footer')


