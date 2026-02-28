<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('welcome', ['name' => 'pacampara-app']);
});

Route::get('show-users', [UserController::class, 'show']);

//service container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

//service providers
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});

//service Provider
Route::get('/test-users', [UserController::class, 'index']);

// Facades
Route::get('test-facade', function (UserService $userService) {
    return Response::json($userService->listUsers());
});


// Exercise #3

//Routing -> Parameters
Route::get('/post/{post}/comment/{comment}', function (string $postId, string $comment) {
    return "Post ID: $postId, Comment ID: $comment";
});

Route::get ('/post/{id}', function (string $id){
    return $id;
})-> where('id', '[0-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})-> where('search', '.*');

//Named Route or Route Alias
Route::get('test/route/sample', function(){
    return route('test-route');
})->name('test-route');

//Route -> Middleware Group 
Route::middleware(['user-middleware'])->group(function(){
    Route::get('route-middleware-group/first', function(Request $request){
        echo 'first';
    });

    Route::get('route-middleware-group/second', function(Request $request){
        echo 'second';
    });
});

//Route -> Controller Group 
Route::controller(UserController::class)->group(function(){
    Route::get('/users','index');
    Route::get('/users/first','first');
    Route::get('/users/{id}','get');
});

//CSRF
Route::get('/token', function (Request $request) {
    return view('token');
});

Route::post('/token', function (Request $request) {
    return $request->all();
});

//Conyroller
//Middleware
Route::get('/users', [UserController::class, 'index'])->middleware('user-middleware');

//Resource
Route::resource('products', ProductController::class);

//View with data
Route::get('/product-list', function(ProductService $productService) {
    $data['products'] = $productService->listProducts();
    return view('products.list', $data);
});

// …or in a controller action
Route::get('/products', [ProductController::class, 'index']);