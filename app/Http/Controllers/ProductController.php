<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Origin;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Array_;

class ProductController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        $product_style = $product->style;
        $style_arr = explode(',', $product_style);
//        dd($style_arr);
        $item_query = Product::where('status', '1')->where('slug', '!=', $product->slug);
        foreach ($style_arr as $style) {
            $item_query->orWhere('style', '=', '%' . $style . '%');
        }
        $eloquent_product = $item_query->take(3)->get();
        $eloquent_product_5 = $item_query->take(5)->get();
        $item_brand_query = Product::where('status', '1')->where('id', '!=', $product->id);
        $item_brand_query->where('brand_id', '=', $product->brand->id);
        $eloquent_product_brand = $item_brand_query->get();
//        dd($eloquent_product_brand);
//        dd($product->brand->id);
        return view('products.product_detail', compact('eloquent_product_5', 'eloquent_product_brand'))->with('product', $product)->with('eloquent_product', $eloquent_product);
    }

    public function admin_index(Request $request)
    {

        $numberItem = 5;
        $orderBy = "ASC";
        $query = Product::where('status', '=', '1');
        $datas = new Array_();


        if ($request->has('origin') && $request->origin != "0") {
            $query->where('origin_id', $request->origin);
            $datas->origin = $request->origin;
        }
        if ($request->has('brand') && $request->brand != "0") {
            $query->where('brand_id', $request->brand);
            $datas->brand = $request->brand;
        }
        if ($request->has('inventor') && $request->inventor != null && strlen($request->inventor) > 0) {
            $query->where('inventor_name', 'like', '%' . $request->inventor . '%');
            $datas->inventor = $request->inventor;
        }
        if ($request->has('product_name') && $request->product_name != null && strlen($request->product_name) > 0) {
            $query->where('name', 'like', '%' . $request->product_name . '%');
            $datas->product_name = $request->product_name;
        }
        $products = $query->orderBy('id', 'desc')->paginate(5);
//        dd($products);
//        $asda = hello;
//        if ($request->has('keyword')){
//            $products = Product::where('status','=','1')->where('name','like','%'.$request->keyword.'%')->orderBy('id',$orderBy)->paginate($numberItem)->appends($request->only('keyword'));
//            return view('admin.products.brand_list',compact('products'));
//        }
//        $products = Product::where('status','=','1')->orderBy('id',$orderBy)->paginate($numberItem);
////        dd($products);


        $brands = Brand::where('status', '=', '1')->orderBy('id', $orderBy)->get();
        $origins = Origin::where('status', '=', '1')->orderBy('id', $orderBy)->get();
        return view('admin.products.product_list')->with(compact('products', 'brands', 'origins', 'datas'));

    }

    public function create()
    {
        $brands = Brand::where('status', '=', '1')->orderBy('id', 'ASC')->get();
        $origins = Origin::where('status', '=', '1')->orderBy('id', 'ASC')->get();
        return view('admin.products.create')->with(compact('brands', 'origins'));;
    }

    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required|integer',
            'origin_id' => 'required|integer',
            'sex' => 'required',
            'concentration' => 'required',
            'volume' => 'required',
            'inventor_name' => 'required',
            'recommended_age' => 'required',
            'released_year' => 'required',
            'incense_level' => 'required',
            'aroma_level' => 'required',
            'price' => 'required',
            'style' => 'required',
            'recommended_time' => 'required',
            'thumbnails' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'T??n h??ng l?? c???n thi???t',
            'brand_id.required' => 'B???t bu???c ph???i c?? h??ng s???n ph???m',
            'origin_id.required' => 'B???t bu???c ph???i c?? xu???t x???',
            'sex.required' => 'B???t bu???c ph???i c?? gi???i t??nh ',
            'concentration.required' => 'B???t bu???c ph???i c?? n???ng ?????',
            'volume.required' => 'B???t bu???c ph???i c??  dung l?????ng',
            'inventor_name.required' => 'B???t bu???c ph???i c?? t??n nh?? ph??t minh',
            'recommended_age.required' => 'B???t bu???c ph???i c?? tu???i ????? ngh???',
            'released_year.required' => 'B???t bu???c ph???i c?? n??m ra m???t',
            'incense_level.required' => 'B???t bu???c ph???i c?? ????? l??u h????ng',
            'aroma_level.required' => 'B???t bu???c ph???i c?? ???nh ?????i di???n',
            'price.required' => 'B???t bu???c ph???i c?? gi?? ti???n',
            'style.required' => 'B???t bu???c ph???i c?? ???nh ?????i di???n',
            'recommended_time.required' => 'B???t bu???c ph???i c?? th???i gian khuy???n ngh???',
            'thumbnails.required' => 'B???t bu???c ph???i c?? ???nh s???n ph???m',
            'description.required' => 'C???n th??m m?? t??? h??ng',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = sanitize($product->name);
        $product->brand_id = $request->brand_id;
        $product->origin_id = $request->origin_id;
        $product->sex = $request->sex;
        $product->concentration = $request->concentration;
        $product->volume = $request->volume;
        $product->inventor_name = $request->inventor_name;
        $product->recommended_age = $request->recommended_age;
        $product->released_year = $request->released_year;
        $product->incense_level = $request->incense_level;
        $product->aroma_level = $request->aroma_level;
        $product->price = $request->price;
        $product->style = $request->style;
        foreach ($request->recommended_time as $time) {
            $product->recommended_time .= $time . ",";
        }

        $product->description = $request->description;
        foreach ($request->thumbnails as $thumb) {
            $product->thumbnail .= $thumb . ",";
        }
//        $product->thumbnail = ;
        $product->status = 1;

//        dd($product);
        $product->save();
        return redirect(route('admin_product_list'));
    }

    public function edit(Request $request, $id)
    {
        $brands = Brand::where('status', '=', '1')->orderBy('id', 'ASC')->get();
        $origins = Origin::where('status', '=', '1')->orderBy('id', 'ASC')->get();
        $product = Product::where('status', '=', '1')->where('id', '=', $id)->first();
        return view('admin.products.edit', compact('product', 'brands', 'origins'));
    }

    public function add_to_cart(Request $request)
    {

        $id = $request->id;
        $quantity = $request->quantity;
        $volume = $request->volume;
        // ki???m tra s???n ph???m theo id truy???n l??n.
        $product = Product::where('status', '=', '1')->where('id', '=', $id)->get();
        if ($product == null) {
            return view('404');
        }
        // l???y th??ng tin gi??? h??ng t??? trong session.
        $shopping_cart = Session::get('shoppingCart');

        if ($shopping_cart == null) {
            // th?? t???o m???i gi??? h??ng l?? m???t m???ng c??c key v?? value
            $shopping_cart = array(); // key v?? value
        }
        $cartItem = null;

        if (array_key_exists($id, $shopping_cart)) {
            $cartItem = $shopping_cart[$id];
        }

        if ($cartItem == null) {
            // n???u kh??ng, t???o m???i m???t cart item.
            $cartItem = [
                'product' => $product,
            ];
            $cartItem['type'][$volume] = $quantity;
        } else {
            // n???u c??, c???ng s??? l?????ng s???n ph???m th??m.
            if (array_key_exists($volume, $shopping_cart[$id]['type'])) {
                $cartItem['type'][$volume] += $quantity;
            } else {
                $cartItem['type'][$volume] = $quantity;
            }
        }

        $shopping_cart[$id] = $cartItem;
//        if($cartItem['volume']['quantity'] <= 0){
//            unset($shopping_cart[$product->id]);
//        }
        Session::put('shoppingCart', $shopping_cart);
        $request->session()->save();

        return response()->json(['success' => "Products added to cart successfully."]);
    }

    public function add(Request $request)
    {
        $id = $request->get('productId');
        $quantity = $request->get('quantity');
        // ki???m tra s???n ph???m theo id truy???n l??n.
        $product = Product::find($id);
        if ($product == null) {
            // n???u kh??ng t???n t???i s???n ph???m ????a v??? trang l???i ko t??m th???y.
            return view('404');
        }

        // l???y th??ng tin gi??? h??ng t??? trong session.
        $shoppingCart = Session::get('shoppingCart');
        // n???u session ko c?? th??ng tin gi??? h??ng
        if ($shoppingCart == null) {
            // th?? t???o m???i gi??? h??ng l?? m???t m???ng c??c key v?? value
            $shoppingCart = array(); // key v?? value
        }
        // ki???m xem s???n ph???m c?? trong gi??? h??ng hay kh??ng.
        $cartItem = null;
        if (array_key_exists($id, $shoppingCart)) {
            $cartItem = $shoppingCart[$id];
        }
        if ($cartItem == null) {
            // n???u kh??ng, t???o m???i m???t cart item.
            $cartItem = array(
                'productId' => $product->id,
                'productName' => $product->name,
                'productPrice' => $product->price,
                'quantity' => $quantity
            );
        } else {
            // n???u c??, c???ng s??? l?????ng s???n ph???m th??m 1.
            $cartItem['quantity'] += $quantity;
        }
        // ????a s???n ph???m v??o gi??? h??ng v???i key ch??nh l?? id c???a s???n ph???m.
        $shoppingCart[$product->id] = $cartItem;
//        if($cartItem['quantity'] <= 0){
//            unset($shoppingCart[$product->id]);
//        }
        Session::put('shoppingCart', $shoppingCart);
//        return redirect('/shopping-cart/show');
    }

    public function search(Request $request)
    {
//        dd($request);
        $keyword = $request->keyword;

        $product_search = Product::where('status', '=', '1')->where('slug', 'LIKE', '%' . $keyword . '%');

        if ($request->has('sex')) {
            $product_search->where('sex', '=', $request->sex);
        }
        if ($request->has('origin')) {
            $product_search->where('origin_id', '=', $request->origin);
        }
        if ($request->has('brand')) {
            $product_search->where('brand_id', '=', $request->brand);
        }

        $product_search = $product_search->paginate(9)->appends(request()->query());
//        dd($product_search);
        $brands = Brand::where('status', '=', '1')->get();
        $origins = Origin::where('status', '=', '1')->get();
//        dd($brands);
        $male_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Nam')->get());
        $female_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'N???')->get());
        $unisex_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Phi gi???i t??nh')->get());

        return view('products.product_list', compact('brands', 'origins', 'male_product_amount', 'female_product_amount', 'unisex_product_amount'))
            ->with('products', $product_search)
            ->with('keyword', $keyword);
    }

    public function productList(Request $request)
    {

        $product = Product::where('status', '=', '1');

        $product = $product->paginate(9)->appends(request()->query());
//        dd($product_search);
        $brands = Brand::where('status', '=', '1')->get();
        $origins = Origin::where('status', '=', '1')->get();
//        dd($brands);
        $male_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Nam')->get());
        $female_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'N???')->get());
        $unisex_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Phi gi???i t??nh')->get());

        return view('products.product_list', compact('brands', 'origins', 'male_product_amount', 'female_product_amount', 'unisex_product_amount'))
            ->with('products', $product);
    }

    public function male_product(Request $request)
    {
        $product_query = Product::where('status', '=', '1');

//        dd($products);
        if ($request->has('origin')) {
            $product_query->where('origin_id', '=', $request->origin);
        }
        if ($request->has('brand')) {
            $product_query->where('brand_id', '=', $request->brand);
        }
        $products = $product_query->where('sex', '=', 'Nam')->paginate(9)->appends(request()->query());
        $male_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Nam')->get());
        $brands = Brand::where('status', '=', '1')->get();
        $origins = Origin::where('status', '=', '1')->get();
        $brand_amount = [];
        $origin_amount = array();
        foreach ($brands as $brand) {
            foreach ($brand->products as $brand_product) {
                if ($brand_product->sex == "Nam") {
                    if ($brand_amount[$brand->id][$brand_product->id] = null) {
                        $brand_amount[$brand->id][$brand_product->id] = 0;
                    }
                    $brand_amount[$brand->id][$brand_product->id] += 1;
                }
            }
        }
//        dd($brand_amount);
//        dd(count($brand_amount));
        foreach ($origins as $origin) {
            foreach ($origin->products as $origin_product) {
                if ($origin_product->sex == "Nam") {
                    if ($origin_amount[$origin->id][$origin_product->id] = null) {
                        $origin_amount[$origin->id][$origin_product->id] = 0;
                    }
                    $origin_amount[$origin->id][$origin_product->id] += 1;
                }
            }
        }

//        dd($origin_amount);

        return view('products.male_product_list', compact('brands', 'origins'))
            ->with('products', $products)
            ->with('brand_amount', $brand_amount)
            ->with('origin_amount', $origin_amount);
    }

    public function update(Request $request, $id)
    {
//        dd($request);
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required|integer',
            'origin_id' => 'required|integer',
            'sex' => 'required',
            'concentration' => 'required',
            'volume' => 'required',
            'inventor_name' => 'required',
            'recommended_age' => 'required',
            'released_year' => 'required',
            'incense_level' => 'required',
            'aroma_level' => 'required',
            'price' => 'required',
            'style' => 'required',
            'recommended_time' => 'required',
            'thumbnails' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'T??n h??ng l?? c???n thi???t',
            'brand_id.required' => 'B???t bu???c ph???i c?? h??ng s???n ph???m',
            'origin_id.required' => 'B???t bu???c ph???i c?? xu???t x???',
            'sex.required' => 'B???t bu???c ph???i c?? gi???i t??nh ',
            'concentration.required' => 'B???t bu???c ph???i c?? n???ng ?????',
            'volume.required' => 'B???t bu???c ph???i c??  dung l?????ng',
            'inventor_name.required' => 'B???t bu???c ph???i c?? t??n nh?? ph??t minh',
            'recommended_age.required' => 'B???t bu???c ph???i c?? tu???i ????? ngh???',
            'released_year.required' => 'B???t bu???c ph???i c?? n??m ra m???t',
            'incense_level.required' => 'B???t bu???c ph???i c?? ????? l??u h????ng',
            'aroma_level.required' => 'B???t bu???c ph???i c?? ???nh ?????i di???n',
            'price.required' => 'B???t bu???c ph???i c?? gi?? ti???n',
            'style.required' => 'B???t bu???c ph???i c?? ???nh ?????i di???n',
            'recommended_time.required' => 'B???t bu???c ph???i c?? th???i gian khuy???n ngh???',
            'thumbnails.required' => 'B???t bu???c ph???i c?? ???nh s???n ph???m',
            'description.required' => 'C???n th??m m?? t??? h??ng',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = sanitize($product->name);
        $product->brand_id = $request->brand_id;
        $product->origin_id = $request->origin_id;
        $product->sex = $request->sex;
        $product->concentration = $request->concentration;
        $product->volume = $request->volume;
        $product->inventor_name = $request->inventor_name;
        $product->recommended_age = $request->recommended_age;
        $product->released_year = $request->released_year;
        $product->incense_level = $request->incense_level;
        $product->aroma_level = $request->aroma_level;
        $product->price = $request->price;
        $product->style = $request->style;
        foreach ($request->recommended_time as $time) {
            $product->recommended_time .= $time . ",";
        }

        $product->description = $request->description;
        $product->thumbnail = "";
        foreach ($request->thumbnails as $thumb) {
            $product->thumbnail .= $thumb . ",";
        }
//        $product->thumbnail = ;
        $product->status = 1;

//        dd($product);
        $product->update();
//        dd($product);
        return redirect(route('admin_product_list'));
    }

    public function female_product(Request $request)
    {
        $product_query = Product::where('status', '=', '1');

//        dd($products);
        if ($request->has('origin')) {
            $product_query->where('origin_id', '=', $request->origin);
        }
        if ($request->has('brand')) {
            $product_query->where('brand_id', '=', $request->brand);
        }
        $products = $product_query->where('sex', '=', 'N???')->paginate(9)->appends(request()->query());
        $female_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'N???')->get());
        $brands = Brand::where('status', '=', '1')->get();
        $origins = Origin::where('status', '=', '1')->get();
        $brand_amount = [];
        $origin_amount = array();
        foreach ($brands as $brand) {
            foreach ($brand->products as $brand_product) {
                if ($brand_product->sex == "N???") {
                    if ($brand_amount[$brand->id][$brand_product->id] = null) {
                        $brand_amount[$brand->id][$brand_product->id] = 0;
                    }
                    $brand_amount[$brand->id][$brand_product->id] += 1;
                }
            }
        }
//        dd($brand_amount);
//        dd(count($brand_amount));
        foreach ($origins as $origin) {
            foreach ($origin->products as $origin_product) {
                if ($origin_product->sex == "N???") {
                    if ($origin_amount[$origin->id][$origin_product->id] = null) {
                        $origin_amount[$origin->id][$origin_product->id] = 0;
                    }
                    $origin_amount[$origin->id][$origin_product->id] += 1;
                }
            }
        }

//        dd($origin_amount);

        return view('products.female_product_list', compact('brands', 'origins'))
            ->with('products', $products)
            ->with('brand_amount', $brand_amount)
            ->with('origin_amount', $origin_amount);
    }

    public function unisex_product(Request $request)
    {
        $product_query = Product::where('status', '=', '1');

//        dd($products);
        if ($request->has('origin')) {
            $product_query->where('origin_id', '=', $request->origin);
        }
        if ($request->has('brand')) {
            $product_query->where('brand_id', '=', $request->brand);
        }
        $products = $product_query->where('sex', '=', 'Phi gi???i t??nh')->paginate(9)->appends(request()->query());
        $unisex_product_amount = count(Product::where('status', '=', '1')->where('sex', '=', 'Phi gi???i t??nh')->get());
        $brands = Brand::where('status', '=', '1')->get();
        $origins = Origin::where('status', '=', '1')->get();
        $brand_amount = [];
        $origin_amount = array();
        foreach ($brands as $brand) {
            foreach ($brand->products as $brand_product) {
                if ($brand_product->sex == "Phi gi???i t??nh") {
                    if ($brand_amount[$brand->id][$brand_product->id] = null) {
                        $brand_amount[$brand->id][$brand_product->id] = 0;
                    }
                    $brand_amount[$brand->id][$brand_product->id] += 1;
                }
            }
        }
//        dd($brand_amount);
//        dd(count($brand_amount));
        foreach ($origins as $origin) {
            foreach ($origin->products as $origin_product) {
                if ($origin_product->sex == "Phi gi???i t??nh") {
                    if ($origin_amount[$origin->id][$origin_product->id] = null) {
                        $origin_amount[$origin->id][$origin_product->id] = 0;
                    }
                    $origin_amount[$origin->id][$origin_product->id] += 1;
                }
            }
        }

//        dd($origin_amount);

        return view('products.unisex_product_list', compact('brands', 'origins'))
            ->with('products', $products)
            ->with('brand_amount', $brand_amount)
            ->with('origin_amount', $origin_amount);
    }

    public function cart()
    {
        return view('cart');
    }
    public function cart_remove(Request $request){
        $cart = Session::get('shoppingCart'); // Second argument is a default value
        if((array_key_exists($request->id, $cart)) !== false) {
            unset($cart[$request->id]);
        }
//        dd($cart);
        Session::put('shoppingCart', $cart);
        return redirect(route('cart'));
    }
}
