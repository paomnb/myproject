<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get("/blog/{id}/{a}/{b}/{cc?}", function($id,$a,$b,$cc="the cute") {
    return "<h1>This is blog page:{$cc} </h1>{$id},{$a},{$b}" ;
    });
    Route::get("/order/create", function() {
        return "<h1>This is order form page : ". request("username") ."</h1>" ;
        });
    Route::get("/blog/create", function() {
    return "<h1>This is order form ". request("id")." page : ". request("username")
            ."</h1>" ;
        });

        //router เชื่อม php html ปกติมาใส่ ลด การบวม
    Route::get("/index", function () {
            return view("index");
            });

            Route::get('/greeting', function () {
                $name = 'James';
                $last_name = 'Mars';
                return view('greeting', compact('name','last_name') );
                });
//ข้อ 2 
                Route::get( "/gallery" , function(){
                   $ant = url("images/ant.jpg");
                    $bird = url("images/bird.jpg");
                    $cat = url("images/cat.jpg");
                    $god = url("images/god.jpg");
                    $spider = url("images/spider.jpg");

                    return view("test/index", compact("ant","bird","cat","god","spider"));
                    });


    Route::get( "/gallery/ant" , function(){
                   $ant = url("images/ant.jpg");
                   return view("test/ant", compact("ant"));
                    });

    Route::get( "/gallery/bird" , function(){
        $bird = url("images/bird.jpg");
        return view("test/bird", compact("bird"));
            });

    Route::get( "/gallery/cat" , function(){
    $cat = url("images/cat.jpg");
    return view("test/cat", compact("cat"));
        });

    Route::get( "/gallery/god" , function(){
    $god = url("images/god.jpg");
    return view("test/god", compact("god"));
        });

    Route::get( "/gallery/spider" , function(){
    $spider = url("images/spider.jpg");
    return view("test/ant", compact("spider"));
        });

Route::get("/myprofile/create","MyProfileController@create");

Route::get("/myprofile/{id}/edit", "MyProfileController@edit");

Route::get("/myprofile/{id}", "MyProfileController@show");
//แสดง ในงาน
Route::get( "/newgallery" , "MyProfileController@gallery" );
Route::get( "/newgallery/ant" , "MyProfileController@ant" );
Route::get( "/newgallery/bird" , "MyProfileController@bird" );

//แสดง coronavirus
Route::get( "/coronavirus" , "MyProfileController@coronavirus" );
//bootstrap


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
///////////////////////เข้าระบบโดย แอดมินกับทีช/////////////////////////////////////////////////////////////////////////////
Route::middleware(['auth', 'role:teacher'])->group(function () {
Route::get("/teacher" , function (){
	return view("teacher/index");
});
Route::get("/student" , function (){
	return view("student/index");
});
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});
///////////////////////////////////////////////////เข้าระบบโดยแอดมิน///////////////////////////////////////////////////
Route::middleware(['auth','admin,teacher'])->group(function () {
//read
Route::get('/covid19', 'Covid19Controller@index');
//display  item
Route::get('/covid19/{id}', 'Covid19Controller@show');
 //read and edit
});
Route::middleware(['auth','teacher'])->group(function () {
 Route::get("/covid19/create", "Covid19Controller@create");
Route::get("/covid19/{id}/edit", "Covid19Controller@edit");
//delete
Route::delete('/covid19/{id}', 'Covid19Controller@destroy');
Route::post("/covid19", "Covid19Controller@store");
Route::patch("/covid19/{id}", "Covid19Controller@update");
Route::resource('/covid19','Covid19Controller');
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
Route::get('/covid19', 'Covid19Controller@index');
Route::get('/covid19', 'Covid19Controller@index');
Route::get('/covid19/{id}', 'Covid19Controller@show');
 Route::get("/covid19/create", "Covid19Controller@create");
 Route::get("/covid19/create", "Covid19Controller@create");
Route::get("/covid19/{id}/edit", "Covid19Controller@edit");
Route::delete('/covid19/{id}', 'Covid19Controller@destroy');
Route::post("/covid19", "Covid19Controller@store");
Route::patch("/covid19/{id}", "Covid19Controller@update");
*/

/*
Route::get('/staffs', 'StaffsController@index');
Route::get("/staffs/create","StaffsController@create");


//display  item
Route::get('/staffs/{id}', 'StaffsController@show');


Route::get("/staffs/{id}/edit", "StaffsController@edit");

Route::post("/staffs", "StaffsController@store");
Route::patch("/staffs/{id}", "StaffsController@update");
*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::middleware(['auth','guest'])->group(function () {
Route::resource('/staff','StaffsController');
Route::resource('post', 'PostController');
Route::resource('book', 'BookController');
Route::resource('book', 'BookController');
Route::resource('street', 'streetController');
Route::resource('street', 'streetController');
Route::resource('street', 'streetController');
});



//pdf
Route::get('/product/pdf', 'ProductController@pdf_index');
Route::resource('profiles', 'profilesController');
Route::resource('vehicles', 'vehiclesController');
Route::resource('user', 'UserController');
Route::resource('order', 'OrderController');
Route::resource('payment', 'PaymentController');
Route::resource('order-product', 'OrderProductController');
Route::resource('product', 'ProductController');
Route::middleware(['auth'])->group(function () {
Route::resource('order', 'OrderController');
Route::resource('payment', 'PaymentController');
Route::resource('order-product', 'OrderProductController');
});
Route::resource('product', 'ProductController');
