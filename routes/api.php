<?php


use App\Http\Controllers\SocialappController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PushSubscription;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!rrr
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('articles', SocialappController::class);

Route::post("push-subscribe", function(Request $request) {
    // Retrieve the push subscription data from the request
    $pushSubscriptionData = $request->getContent();

    // Check if a subscription with the same data already exists
    $existingSubscription = PushSubscription::where('data', $pushSubscriptionData)->first();

    if ($existingSubscription) {
        // Subscription already exists, you can handle this case (e.g., return a response)
        return response()->json(['message' => 'Subscription already exists'], 422);
    }

    // Create a new push subscription
    PushSubscription::create([
        'data' => $pushSubscriptionData,
    ]);

    // Return a success response
    return response()->json(['message' => 'Subscription created successfully']);
});