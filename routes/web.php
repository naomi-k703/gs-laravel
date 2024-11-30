<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IconController;



Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [IconController::class, 'index']);
Route::get('/icon/create',[IconController::class, 'create']);
Route::get('/icon/{icon_id}', [IconController::class, 'show']);

// 以下の部分を追加してください
Route::post('/icon/store',[IconController::class, 'store']);
Route::post('/icon/{icon_id}/update',[IconController::class, 'update']);
Route::post('/icon/{icon_id}/destroy',[IconController::class, 'destroy']);
