<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandProduct;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showHomePage()
    {
        $category = Category::all();
        $cart = Cart::where('user_id',Session::get('loginId'))->get();

        return view('index.index', compact('category','cart'));
    }

    public function showLoginPage()
    {
        return view('index.auth.login');
    }
    public function showRegisterPage()
    {
        return view('index.auth.register');
    }

    public function validateLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|min:1|max:8',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/dashboard-page');
            } else {
                return back()->with('fail', 'password not matches.');
            }
        } else {
            return back()->with('fail', 'email does not match our records.');
        }
    }

    public function register(Request $request, User $User)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:1|max:8',
        ]);
        $res = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $data = User::where('email', '=', $request->email)->first();
        $role = Role::create([
            'name' => $request->role,
            'user_id' => $data->id,
        ]);
        if ($res) {
            return back()->with('success', 'you have registered successfully now login');
        } else {
            return back()->with('fail', 'something wrong');
        }
    }
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/login');
        }
    }

    public function dashboardPage()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        $all = User::all();
        $category = Category::all();
        $brand = Brand::all();
        $cart = Cart::all();
        $product = product::all();
        return view('index.auth.dashboard-Page', compact('data', 'all', 'category', 'brand', 'cart', 'product'));
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'firstname' . $id => 'required',
            'lastname' . $id => 'required',
            'email' . $id => 'required|email',
            'password' . $id => 'required|min:1|max:8',
            'role' . $id => 'required',
        ]);

        User::find($id)->update([
            'firstname' => $request->input('firstname' . $id),
            'lastname' => $request->input('lastname' . $id),
            'email' => $request->input('email' . $id),
            'password' => hash::make($request->input('password' . $id)),
            'role' => $request->input('role' . $id),
        ]);
        return redirect('dashboard-page');
    }
    public function deleteUser(request $request, $id)
    {
        user::find($id)->delete();
        return redirect('dashboard-page');
    }
    public function showCart($id)
    {
        $cart = cart::where('user_id', Session::get('loginId'));
        $product = Product::where('id', $id)->first();
        $category = Category::where('id', $product->category_id)->first();
        return view('index.productsview.showproducts', compact('product', 'category', 'cart'));
    }
    public function addCategory(request $request)
    {
        $category = Category::create([
            'category_name' => $request->category_name,
        ]);
        return redirect('dashboard-page');
    }
    public function addBrand(request $request)
    {
        $category = Category::where('category_name', '=', $request->category_name)->first();
        $brand = brand::create([
            'category_id' => $category->id,
            'brand_name' => $request->brand_name,
        ]);
        return redirect('dashboard-page');
    }

    public function addProduct(request $request)
    {
        $image_name = $request->file('image')->getClientOriginalName();
        $image_name = time() . $image_name;
        $request->file('image')->move('frontend/gallery/', $image_name);
        $product = product::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'productname' => $request->name,
            'image' => $image_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'desc' => $request->desc,
            'pricebefore' => $request->pricebefore

        ]);
        BrandProduct::create([
            'brand_id' => $request->brand_id,
            'product_id' => $product->id,
        ]);
        return redirect('/index');
    }
    public function categorySelected($id)
    {
        $brands = Brand::where('category_id', $id)->get();
        return $brands;
    }
    public function showProduct($id)
    {
        if ($id == 'all') {
            $product = Product::all();
        } else {
            $product = Product::where('category_id', $id)->get();
        }

        return $product;
    }
    public function addToCart(request $request)
    {
        cart::create([
            'quantity' => $request->quantity,
            'brand_id' => $request->brand_id,
            'product_id' => $request->product_id,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);
        return redirect('index');
    }
    public function editProductPage($id)
    {
        $category = Category::all();
        $product = Product::where('id', $id)->get();
        return view('index.auth.editdbproduct', compact('product', 'category'));
    }
    public function editProduct(request $request, $id)
    {
        $image_name = $request->file('image')->getClientOriginalName();
        $image_name = time() . $image_name;
        $request->file('image')->move('frontend/gallery/', $image_name);
        product::where('id', $id)->update([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'productname' => $request->productname,
            'desc' => $request->desc,
            'price' => $request->price,
            'pricebefore' => $request->pricebefore,
            'quantity' => $request->quantity,
            'image' => $image_name,
        ]);
        return redirect('/dashboard-page');
    }
    public function deleteProduct($id)
    {
        product::find($id)->delete();
        return redirect('/dashboard-page');
    }
    public function moderatorCartUpdate(request $request, $id)
    {

        cart::where('id', $id)->update([
            'quantity' => $request->quantity,
        ]);
        return redirect('dashboard-page');
    }
    public function deleteCart($id)
    {
        cart::find($id)->delete();
        return redirect('dashboard-page');
    }
    public function adminCartUpdate(request $request, $id)
    {
        cart::where('id', $id)->update([
            'quantity' => $request->quantity,
        ]);
        return redirect('dashboard-page');
    }
    public function adminCartDelete($id)
    {
        cart::where('id', $id)->delete();
        return redirect('dashboard-page');
    }
    public function search(Request $request)
    {
        if($request->search != null){
            $products  = Product::where('productname', 'like', "%$request->search%")
            ->orWhere('price', 'LIKE', "%$request->search%")
            ->orWhere('desc', 'LIKE', "%$request->search%")->get();
        return view('index.searchresults', compact('products'));
        }
       else{
        return redirect('index');
       }
    }
    public function shoppingCart(){
        $cart = Cart::where('user_id',Session::get('loginId'))->get();
        return view('index.productsview.shoppingcart',compact('cart'));
    }
    public function deleteShoppingCart ($id){
        $cart =Cart::find($id)->delete();
        return redirect('shoppingcart');
    }
    public function searchResults ($searchName){
        $products  = Product::where('productname', 'like', "%$searchName%")
            ->orWhere('price', 'LIKE', "%$searchName%")
            ->orWhere('desc', 'LIKE', "%$searchName%")->get();
        return $products;
    }
    public function searchAjax($id){
        $products = Product::where('id',$id)->get();
    return view('index.searchresults', compact('products'));
    }
}
