<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return \App\Models\User::all();
});
Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    $request->validate([
            'birthday' => 'max:255'
        ]
    );
    $id = $request->input('id');
    $birthday = $request->input('birthday');
    /**
     * @var User $user
     */
    $user = User::where('id', $id)->first();
    if (null === $user) {
        new NotFoundHttpException();
    }
    $user->setAttribute('birthday', $birthday);
    $user->save();
});
