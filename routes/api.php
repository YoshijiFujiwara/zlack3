<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('select_workspace', 'AuthController@selectWorkspace'); // ログインするワークスペースを選択する
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

// ワークスペースの情報を取得する
Route::post('/target_workspace/{id}', 'WorkspaceController@getTargetWorkspace');

// ワークスペースを作成する際の確認用メールの送信
Route::get('/create_workspace/send_confirm_email', 'WorkspaceController@sendConfirmEmail');