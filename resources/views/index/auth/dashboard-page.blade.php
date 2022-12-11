<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dashboard.css') }}">

    <title>dashboard</title>
</head>

<body>
    <div id="overlay"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="padding: 0">
                <div class="dashboard">
                    <div id="navbar">
                        <nav class="navbar navbar-expand-lg bg-danger">
                            <div class="container-fluid">
                                <h2 class="navbar-brand">dashboard</h2>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    </ul>
                                    <li id="redirecthome"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="nav-item" style="list-style: none">
                                        <a class="nav-link" href="{{ route('logout.user') }}">logout</a>
                                    </li>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="dashboard-container">
                        <div class="row">
                            <div class="col-lg-2 col-sm-12" style="padding: 0">
                                <div class="dashboard-leftside" id="dashboard-leftside">
                                    <ul>
                                        @if ($data->role->first()->name == 'moderator')
                                            <li id="showUserBtn"><span><i class="fas fa-check"></i></span><a
                                                    href="#">show
                                                    user</a> </li>
                                            <li id="myCartBtn"> <span><i class="fas fa-check-double"></i></span><a
                                                    href="#">my cart
                                                </a></li>
                                        @else
                                            <li id="showUsersBtn"><span><i class="fas fa-check"></i></span><a
                                                    href="#">show
                                                    users</a>
                                            </li>
                                            <li id="addCategoryBtn"> <span><i class="fas fa-check-double"></i></span><a
                                                    href="#">add category</a> </li>
                                            <li id="addBrandBtn"> <span><i class="fas fa-check-double"></i></span><a
                                                    href="#">add brand</a> </li>
                                            <li id="addProductBtn"> <span><i class="fas fa-check-double"></i></span><a
                                                    href="#">
                                                    Add product
                                                </a></li>
                                            <li id="showProductBtn"> <span><i class="fas fa-check-double"></i></span><a
                                                    href="#">
                                                    show product
                                                </a></li>
                                            <li id="showCartBtn"> <span><i class="fas fa-check-double"></i></span><a
                                                    href="#">show
                                                    cart
                                                </a></li>
                                    </ul>
                                    @endif
                                </div>

                            </div>
                            <div class="col-lg-10 col-sm-12" style="padding: 0">
                                <div class="dashboard-rightside" id="dashboard-rightside">
                                    <!---------------------------------------------------------------->



                                    @if ($data->role->first()->name == 'moderator')
                                        <div class="table-parent">
                                            <table class="table" id="userTable">
                                                <thead>
                                                    <th>firstname</th>
                                                    <th>lastname</th>
                                                    <th>email</th>
                                                    <th>role</th>
                                                    <tr style="vertical-align: middle">
                                                        <td>{{ $data->firstname }}</td>
                                                        <td>{{ $data->lastname }}</td>
                                                        <td>{{ $data->email }}</td>
                                                        <td>{{ $data->role->first()->name }}</td>
                                                    </tr>
                                            </table>
                                        </div>
                                        <div id="myCart" style='display:none'>
                                            <div class="table-parent">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>category</th>
                                                            <th>brand</th>
                                                            <th>productname</th>
                                                            <th>productdescription</th>
                                                            <th>price</th>
                                                            <th>quantity</th>
                                                            <th>image</th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <div style="display:none"> {{ $n = 1 }}</div>
                                                        @foreach ($cart as $c)
                                                            @foreach ($c->user as $user)
                                                                @if ($user->id == Session::get('loginId'))
                                                                    @foreach ($c->category as $cat)
                                                                        @foreach ($c->brand as $b)
                                                                            @foreach ($c->product as $p)
                                                                            @endforeach
                                                                        @endforeach
                                                                        @csrf
                                                                        <tr class="tr1"
                                                                            style="vertical-align: middle">
                                                                            <td>{{ $n++ }}</td>
                                                                            <td>{{ $cat->category_name }}</td>
                                                                            <td>{{ $b->brand_name }}</td>
                                                                            <td>{{ $p->productname }}</td>
                                                                            <td>{{ $p->desc }}</td>
                                                                            <td>{{ $p->price }}</td>
                                                                            <td>{{ $c->quantity }}</td>
                                                                            <td><img height="100px"
                                                                                    src="{{ asset('frontend/gallery/' . $p->image) }}"
                                                                                    alt=""></td>
                                                                            <td>
                                                                                <button type="button"
                                                                                    class="btn btn-warning fakeBtn mb-2"><i
                                                                                        style="color: white"
                                                                                        class="fas fa-pen-to-square"></i></button>
                                                                                <form
                                                                                    action="{{ route('delete.cart', $c->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <button class="btn btn-danger"><i
                                                                                            class="fas fa-trash"></i></button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="display: none" class="tr2">
                                                                            <td>{{ $n++ }}</td>
                                                                            <td> {{ $cat->category_name }} </td>
                                                                            <td> {{ $b->brand_name }} </td>
                                                                            <td> {{ $p->productname }} </td>
                                                                            <td>{{ $p->desc }}</td>
                                                                            <td> {{ $p->price }} </td>
                                                                            <form
                                                                                action="{{ route('update.cart', $c->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <td>
                                                                                    <input name='quantity'
                                                                                        type="number" min="1"
                                                                                        value="{{ $c->quantity }}">

                                                                                </td>
                                                                                <td>
                                                                                    <img height="100px"
                                                                                        src="{{ asset('frontend/gallery/' . $p->image) }}"
                                                                                        alt="">
                                                                                </td>
                                                                                <td>

                                                                                    <button type="submit"
                                                                                        class="updateCart btn btn-primary "><i
                                                                                            class="fas fa-check"></i></button>

                                                                                    <button type="button"
                                                                                        class="btn btn-success cUpCart">
                                                                                        <i
                                                                                            class="fas fa-xmark"></i></button>
                                                                                </td>
                                                                            </form>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>


                                            <!----------------------------------------------------------->
                                        @else
                                            <div class="table-parent">
                                                <table class="table" id="usersTable">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>firstname</th>
                                                        <th>lastname</th>
                                                        <th>email</th>
                                                        <th>role</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <div class="counter" style="display:none">{{ $no = 1 }}
                                                        </div>
                                                        @foreach ($all as $users)
                                                            <tr style="vertical-align: middle">
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $users->firstname }}</td>
                                                                <td>{{ $users->lastname }}</td>
                                                                <td>{{ $users->email }}</td>
                                                                <td>{{ $users->role->first()->name }}</td>
                                                                <td class="d-flex">
                                                                    <form id="updateForm" class="updateForm "
                                                                        action="{{ route('update.user', $users->id) }}"
                                                                        method="Post" autocomplete="off"
                                                                        style="margin-right: 10px">
                                                                        @csrf
                                                                        @method('put')
                                                                        <button type="button"
                                                                            class="btn btn-primary openmodal"><i
                                                                                class="fas fa-pen-to-square"></i>
                                                                        </button>
                                                                        <div class="update-modal">
                                                                            <div class="mheader">
                                                                                <div class="close-btn"><i
                                                                                        class="fas fa-xmark"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mtitle">
                                                                                <h4>update user</h4>
                                                                            </div>
                                                                            <div class="mbody">
                                                                                <label
                                                                                    for="firstname{{ $users->id }}">firstname</label>
                                                                                <input id='firstname' type="text"
                                                                                    class="form-control"
                                                                                    title="please fill in this form"
                                                                                    name="firstname{{ $users->id }}">
                                                                                @error('firstname' . $users->id)
                                                                                    <span class='text-danger'>
                                                                                        field is required
                                                                                    </span>
                                                                                @enderror

                                                                                <label
                                                                                    for="lastname{{ $users->id }}">lastname</label>
                                                                                <input id='lastname' type="text"
                                                                                    class="form-control"
                                                                                    title="please fill in this form"
                                                                                    name="lastname{{ $users->id }}"><br>
                                                                                @error('lastname' . $users->id)
                                                                                    <span class='text-danger'>field is
                                                                                        required</span>
                                                                                @enderror

                                                                                <label
                                                                                    for="email{{ $users->id }}">email</label>
                                                                                <input id='email' type="email"
                                                                                    class="form-control"
                                                                                    title="please fill in this form"
                                                                                    name="email{{ $users->id }}"><br>
                                                                                @error('email' . $users->id)
                                                                                    <span class='text-danger'>field is
                                                                                        required</span>
                                                                                @enderror

                                                                                <label
                                                                                    for="password{{ $users->id }}">password</label>
                                                                                <input id='password' type="password"
                                                                                    class="form-control"
                                                                                    title="please fill in this form"
                                                                                    name="password{{ $users->id }}"><br>

                                                                                @error('password' . $users->id)
                                                                                    <span class='text-danger'>field is
                                                                                        required</span>
                                                                                @enderror

                                                                                <label
                                                                                    for="role{{ $users->id }}">role</label><br>
                                                                                <select name="role{{ $users->id }}"
                                                                                    title="please choose your role"
                                                                                    id="role">
                                                                                    <option selected disabled>select
                                                                                        your role</option>
                                                                                    <option value="administrator">
                                                                                        administrator
                                                                                    </option>
                                                                                    <option value="moderator">moderator
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mfooter">
                                                                                <button type="button"
                                                                                    class="btn btn-primary cancel">cancel</button>
                                                                                <button type='submit'
                                                                                    class="btn btn-warning update">update</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    <form
                                                                        action="{{ route('delete.user', $users->id) }}"
                                                                        method="Post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        @if(Session::get('loginId')!= $users->id)
                                                                        <button type="button"
                                                                            class="btn btn-danger opendm"><i
                                                                                class="fas fa-trash"></i>
                                                                        </button>
                                                                        @endif
                                                                        <div class="delete-modal">
                                                                            <div class="mheader">
                                                                                <div class="close-btn"><i
                                                                                        class="fas fa-xmark"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mtitle">
                                                                                <h4>delete user</h4>
                                                                            </div>
                                                                            <div class="mbody">
                                                                                <h4>are you sure you want to delete the
                                                                                    selected
                                                                                    user?
                                                                                </h4>
                                                                            </div>
                                                                            <div class="mfooter">
                                                                                <button type="button"
                                                                                    class="btn btn-primary cancel">cancel</button>
                                                                                <button type='submit'
                                                                                    class="btn btn-danger delete">delete</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div id="addCategory" style="display:none">
                                                <form action="{{ route('add.category') }}" method="Post"
                                                    autocomplete="off">
                                                    @csrf
                                                    <label for="selectcategory">enter category</label><br>
                                                    <input id="catinput" name="category_name" type="text"
                                                        placeholder="enter category name" title="enter category name"
                                                        required>

                                                    <br>
                                                    <button id="add" type="submit"
                                                        class="btn btn-success btn-lg mt-2">add</button>

                                                </form>
                                            </div>
                                            <div id="catdisplay" style="display: none">
                                                <form action="{{ route('add.brand') }}" method="Post"
                                                    autocomplete="off">
                                                    @csrf
                                                    <label for="category">category</label> <br>
                                                    <select name="category_name" id="showcat">
                                                        <option selected disabled value="">Select Category
                                                        </option>
                                                        @foreach ($category as $c)
                                                            <option value="{{ $c->category_name }}">
                                                                {{ $c->category_name }}</option><br>
                                                        @endforeach

                                                    </select><br><br>
                                                    <label for="brand">enter brand</label><br>
                                                    <input type="text" id="brandname" name='brand_name'
                                                        placeholder="enter brand name" title="enter brand name"
                                                        required><br>
                                                    <button id="addbr" type="submit"
                                                        class="btn btn-primary btn-lg mt-2">add</button><br>
                                                </form>
                                            </div>
                                            <div id="addProduct" style='display:none'>
                                                <form action="{{ route('add.product') }}" method="POST"
                                                    enctype="multipart/form-data" autocomplete="off">
                                                    @csrf
                                                    <label for="category">category</label><br>
                                                    <select id="categorySelect" name="category_id"><br>
                                                        <option selected disabled value="">Select Category
                                                        </option>
                                                        @foreach ($category as $c)
                                                            <option value="{{ $c->id }}">
                                                                {{ $c->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select> <br>
                                                    <label for="brand"> brand</label> <br>
                                                    <select type="text" id="brand" name='brand_id'>
                                                        <option selected disabled value="">Select Category
                                                        </option>
                                                    </select><br>
                                                    <label for="name">product name</label><br>
                                                    <input type="text" id='pname' name=name
                                                        title="input product name" placeholder="enter product name"
                                                        required> <br>
                                                    <label for="desc">product description</label><br>
                                                    <textarea name="desc" id="pdesc" cols="50" rows="10" title="enter product description"
                                                        placeholder="enter product description" required></textarea><br>
                                                    <label for="image" style="color: white;">choose product
                                                        image</label><br>
                                                    <span id='uploadProductImage'><i class="fas fa-cloud"></i></span>
                                                    <input type="file" id="upload-btn" name='image' hidden
                                                        title="choose product image" required> <br>
                                                    <div class="discount">
                                                        <h4>does this product has a discount ?</h4>
                                                        <div class="choice d-flex justify-content-center">
                                                            <input type="radio" name="discounted" id="yes"
                                                                value="yes"><label for="">yes</label>
                                                            <input type="radio" name="discounted" id="no"
                                                                value="no"><label for="">no</label>
                                                        </div>
                                                    </div>
                                                    <div id="before" style="display: none">
                                                        <h4 for="">enter price before discount</h4>
                                                        <input type="number" min="1" name="pricebefore"
                                                            id="pbefore" title="enter price before"
                                                            placeholder="enter price before">
                                                    </div>
                                                    <label for="price">price</label><br>
                                                    <input type="number" name="price" min="1"
                                                        id="price" title='enter price' required><br>
                                                    <label for="quantity">quantity</label><br>
                                                    <input type="number" name="quantity" min="1"
                                                        id="quantity"title='choose quantity' required><br>
                                                    <button id="addpr" type="submit" class="btn btn-success"
                                                        style="margin-top: 10px">add</button>
                                                </form>

                                            </div>
                                            <div id="showProduct" style='display:none'>
                                                <div class="table-parent">
                                                    <table class="table ">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>category</th>
                                                                <th>brand</th>
                                                                <th>name</th>
                                                                <th>desc</th>
                                                                <th>discount</th>
                                                                <th>price</th>
                                                                <th>quantity</th>
                                                                <th>image</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
    
                                                            <div style="display:none">{{ $n = 1 }} </div>
                                                            @foreach ($product as $p)
                                                                <tr style="vertical-align: middle">
                                                                    <td>{{ $n++ }}</td>
                                                                    @foreach ($p->category as $cat)
                                                                        <td>{{ $cat->category_name }}
                                                                        </td>
                                                                    @endforeach
                                                                    @foreach ($p->brand as $brand)
                                                                        <td>{{ $brand->brand_name }}
                                                                        </td>
                                                                    @endforeach
                                                                    <td>{{ $p->productname }}</td>
    
                                                                    <td>{{ $p->desc }}</td>
    
                                                                    <td>{{ $p->pricebefore }}</td>
    
                                                                    <td>{{ $p->price }}</td>
    
                                                                    <td>{{ $p->quantity }}</td>
    
                                                                    <td><img height="100px"width="100px"src="{{ asset('frontend/gallery/' . $p->image) }}"
                                                                            alt=""></td>
    
                                                                    <td>
    
                                                                        <a href="{{ route('edit.product', $p->id) }}"
                                                                            class="btn btn-warning mb-2"><i
                                                                                style="color: white"
                                                                                class="fas fa-pen-to-square"></i></a>
    
                                                                        </form>
    
                                                                        <form
                                                                            action="{{ route('delete-product', $p->id) }}"
                                                                            method="Post">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <button class="btn btn-danger"> <i
                                                                                    class="fas fa-trash"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </form>
    
                                                        </tbody>
                                                    </table>
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div id="showCart" style='display:none'>
                                            <div class="table-parent">
                                                <table class="table ">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>category</th>
                                                            <th>brand</th>
                                                            <th>name</th>
                                                            <th>desc</th>
                                                            <th>discount</th>
                                                            <th>price</th>
                                                            <th>quantity</th>
                                                            <th>image</th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td style="display:none">{{ $n = 1 }}</td>
                                                        @foreach ($cart as $c)
                                                            @foreach ($c->user as $user)
                                                                @if ($user->id == Session::get('loginId'))
                                                                    <tr class="tr1" style="vertical-align: middle">
    
                                                                        <td>{{ $n++ }}</td>
                                                                        @foreach ($c->category as $cat)
                                                                            <td>{{ $cat->category_name }}</td>
                                                                        @endforeach
                                                                        @foreach ($c->brand as $brand)
                                                                            <td>{{ $brand->brand_name }}</td>
                                                                        @endforeach
                                                                        @foreach ($c->product as $product)
                                                                            <td>{{ $product->productname }}</td>
                                                                            <td>{{ $product->desc }}</td>
                                                                            <td>{{ $product->pricebefore }}</td>
                                                                            <td>{{ $product->price }}</td>
                                                                            <td>{{ $c->quantity }}</td>
                                                                            <td><img height="100px"
                                                                                    src="{{ asset('frontend/gallery/' . $product->image) }}"
                                                                                    alt=""></td>
                                                                            <td>
                                                                                <button
                                                                                    class="btn btn-warning fakeBtn mb-2"><i
                                                                                        style="color:white"
                                                                                        class="fas fa-pen-to-square"></i></button>
                                                                                <form
                                                                                    action="{{ route('cart.delete', $c->id) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <button class="btn btn-danger"><i
                                                                                            class="fas fa-trash"></i></button>
                                                                                </form>
                                                                            </td>
                                                                        @endforeach
    
                                                                    </tr>
                                                                    <div style="display:none">{{ $s = 1 }}
                                                                    </div>
                                                                    <tr class="tr2" style="display:none">
                                                                        <td>{{ $s++ }}</td>
                                                                        <td>{{ $cat->category_name }}</td>
                                                                        <td>{{ $brand->brand_name }}</td>
                                                                        <td>{{ $product->productname }}</td>
                                                                        <td>{{ $product->desc }}</td>
                                                                        <td>{{ $product->pricebefore }}</td>
                                                                        <td>{{ $product->price }}</td>
                                                                        <form action="{{ route('cart.update', $c->id) }}"
                                                                            method="post">
                                                                            @csrf
    
                                                                            <td><input type="number" name="quantity"
                                                                                    value="{{ $c->quantity }}"
                                                                                    name="" id=""
                                                                                    min="1"></td>
                                                                            <td>
                                                                                <button
                                                                                    class="btn btn-warning updateCart"><i
                                                                                        class="fas fa-check"></i></button>
                                                                        </form>
                                                                        <button class="btn btn-success cUpCart"><i
                                                                                class="fas fa-xmark"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
    
                                                    </tbody>
                                                </table>
                                            </div>
                                          
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/dashboard.js') }}"></script>
</body>

</html>
