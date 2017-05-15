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

Route::get('/', function() {
    return File::get(base_path('frontend/index.html'));
});

Route::get('auth/google', 'Auth\LoginController@googleConfirmLink');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogle');

Route::post('/load', function () {
    if(isset($_FILES['avatar'])){
        $req = false; // изначально переменная для "ответа" - false
        // Приведём полученную информацию в удобочитаемый вид
        ob_start();
        echo '<pre>';
        print_r($_FILES['avatar']);
        move_uploaded_file($_FILES['avatar']['tmp_name'], storage_path('app/ava.png'));
        echo '</pre>';
        $req = ob_get_contents();
        ob_end_clean();
        echo json_encode($req); // вернем полученное в ответе
        exit; }
});



