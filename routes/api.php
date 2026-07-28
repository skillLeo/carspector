<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Phase 3 — Inspection Partner API
|--------------------------------------------------------------------------
| Authenticated via API key (X-API-Key header or Authorization: Bearer).
| Completely separate from all web/admin/B2B routes.
*/
Route::middleware(['throttle:60,1', 'inspection.partner.auth'])
    ->prefix('inspection')
    ->group(function () {
        Route::post('/result', [\App\Http\Controllers\Api\InspectionResultController::class, 'receive'])
            ->name('api.inspection.result');
    });
