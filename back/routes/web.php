<?php
use App\Http\Controllers\admin\auth_controller;
use App\Http\Controllers\Admin\categories_controller;
use App\Http\Controllers\Admin\home_controller;
use App\Http\Controllers\admin\sub_controller;
use App\Http\Controllers\Admin\user_controller;
use App\Http\Controllers\admin\brands_controller;
use App\Http\Controllers\admin\products_controller;
use App\Http\Controllers\admin\slider_controller;
use App\Http\Controllers\shop\front_controller;
use App\Http\Controllers\shop\shop_controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


Route::get("/home",[front_controller::class,'index'])->name('shop.index');
Route::get("/shops/{categoriesSlug?}/{subcategoriesSlug?}",[shop_controller::class,'index'])->name('shop.shop');




Route::group(['prefix' => 'admin'], function () {
    //===========================================================================================================================//
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get("/login", [auth_controller::class, "login"])->name("admin.login"); //completed
        Route::get("/register", [auth_controller::class, "register"])->name("admin.register"); //completed
        Route::post("/user/login", [auth_controller::class, "login_user"])->name("admin.login_user"); //completed
        Route::post("/user/register", [auth_controller::class, "register_user"])->name("admin.register_user"); //completed
    });
    //===========================================================================================================================//
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get("/dashboard", [home_controller::class, "dashboard"])->name("admin.dashboard"); //completed
        Route::get('/logout', [home_controller::class, 'logout'])->name('admin.logout');//completed
        Route::get('/clear', [home_controller::class, 'clear'])->name('admin.clear');//completed
        Route::get("/password", [home_controller::class, "password"])->name("admin.password");//completed
        Route::post("/changes", [home_controller::class, "changes_password"])->name("admin.changes");//completed
        Route::get('/support', [home_controller::class, 'support'])->name('admin.support');//completed
        Route::get('/profile', [home_controller::class, 'profile'])->name('admin.profile');//completed
    //========================================================================================================
        Route::get("/users", [user_controller::class, "index"])->name("user.index"); //completed
        Route::get("/uses/find", [user_controller::class, "find"])->name("user.find"); //completed
        Route::post("/uses/delete", [user_controller::class, "delete"])->name("user.delete"); //completed
        Route::post("/user/update", [user_controller::class, "update"])->name("user.update"); //fix
        Route::get("/users/create", [user_controller::class, "create"])->name("user.create"); //completed
        Route::get("/users/edit/{id}", [user_controller::class, "edit"])->name("user.edit"); //completed
        Route::post("/users/store", [user_controller::class, "store"])->name("user.store"); //completed
        Route::get("/user/history", [user_controller::class, "history"])->name("user.history");//completed
        Route::post("/user/upload",[user_controller::class,"upload"])->name("user.upload");//completed
        Route::get("/user/district",[user_controller::class,'district'])->name("user.district");//completed
        Route::get("/user/commune",[user_controller::class,'commune'])->name("user.commune");//completed
        Route::get("/user/village",[user_controller::class,'village'])->name("user.village");//completed







        Route::get("/user/chat",[user_controller::class,'chat'])->name("user.chat");
        Route::get("/user/inbox",[user_controller::class,"inbox"])->name("user.inbox");
        //====================================================================================================
        //====================================================================================================\\
        Route::get("/categories", [categories_controller::class, "index"])->name("categories.index");//completed
        Route::get("/getslug", function (Request $request) {
            $slug = "";
            if (!empty($request->title)) {
                $slug = Str::slug($request->title);
            }
            return response()->json(
                [
                    'status' => true,
                    'slug' => $slug,
                ]
            );
        })->name('getslug');//completed

        Route::get("/categories/create", [categories_controller::class, "create"])->name("categories.create");//completed
        Route::post("/categories/store",[categories_controller::class,"store"])->name("catecory.store");//completed
        Route::get("/categories/find",[categories_controller::class,'find'])->name("categories.find");//completed
        Route::post("/categories/delete",[categories_controller::class,"delete"])->name("categories.delete");//completed
        Route::post("/categories/update",[categories_controller::class,"update"])->name("categories.update");//completed
        Route::post("/categories/upload",[categories_controller::class,"upload"])->name("categories.upload");//completed
        Route::get("/categories/get",[categories_controller::class,'get'])->name('categories.get');
        //====================================================================================================//
        Route::get("/sub/categories",[sub_controller::class,"index"])->name("sub.index");//completed
        Route::get("/sub/create",[sub_controller::class,'create'])->name('sub.create');//completed
        Route::post("/sub/store",[sub_controller::class,'store'])->name("sub.store");//completed
        Route::get("/sub/find", [sub_controller::class, "find"])->name("sub.find"); //completed
        Route::post("/sub/delete", [sub_controller::class, "delete"])->name("sub.delete"); //completed
        Route::post("/sub/update",[sub_controller::class,"update"])->name("sub.update");//completed
        Route::get("/sub/get",[sub_controller::class,"get"])->name("sub.get");
        //====================================================================================================
        Route::get("/brands",[brands_controller::class,'index'])->name('brands.index');//completed
        Route::get("/brands/find",[brands_controller::class,'find'])->name('brands.find');//completed
        Route::get("/brands/create",[brands_controller::class,'create'])->name('brands.create');//completed
        Route::post("/brands/store",[brands_controller::class,'store'])->name('brands.store');//completed
        Route::post("/brands/update",[brands_controller::class,'update'])->name('brands.update');//completed
        Route::post("/brands/delete",[brands_controller::class,'delete'])->name('brands.delete');//completed
        Route::get("/brands/get",[brands_controller::class,"get"])->name('brands.get');
        //==================================================================================================
        Route::get("/products",[products_controller::class,'index'])->name('products.index');//completed
        Route::get("/products/create",[products_controller::class,"create"])->name("products.create");//completed
        Route::post("/store",[products_controller::class,'store'])->name('products.store');//completed
        Route::get("/product/find",[products_controller::class,'find'])->name('products.find');//completed
        Route::post("/products/delete",[products_controller::class,'delete'])->name('products.delete');
        Route::post("/products/upload",[products_controller::class,'upload'])->name('products.upload');
        Route::post("/products/update",[products_controller::class,'update'])->name('products.update');
        //====================================================================================================
        Route::get('/slider',[slider_controller::class,'index'])->name('slider.index');
        Route::get('/slider/create',[slider_controller::class,'create'])->name('slider.create');
        Route::post("/slider/store",[slider_controller::class,'store'])->name('slider.store');
        Route::get("/slider/find",[slider_controller::class,'find'])->name('slider.find');
        Route::post("slider/delete",[slider_controller::class,"delete"])->name("slider.delete");
        Route::post("/slider/update",[slider_controller::class,'update'])->name('slider.update');
    });
});
