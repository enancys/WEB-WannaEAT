<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiCategories;
use App\Http\Controllers\API\ApiCuisines;
use App\Http\Controllers\API\ApiFavCategoryIngredients;
use App\Http\Controllers\API\ApiFoods;
use App\Http\Controllers\API\ApiFoodsIngredients;
use App\Http\Controllers\API\ApiFoodsTags;
use App\Http\Controllers\API\ApiIngredients;
use App\Http\Controllers\API\ApiRatings;
use App\Http\Controllers\API\ApiRestaurants;
use App\Http\Controllers\API\ApiRestaurantsFoods;
use App\Http\Controllers\API\ApiRestrictions;
use App\Http\Controllers\API\ApiTags;
use App\Http\Controllers\API\ApiUser;
use App\Http\Controllers\API\ApiUserDietaryResctrictions;
use App\Http\Controllers\API\ApiUserDislikedIngredients;
use App\Http\Controllers\API\ApiUserFavoriteCategories;
use App\Http\Controllers\API\ApiUserFavoriteCuisines;
use App\Http\Controllers\API\ApiUserPreferences;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return response()->json([
        'user' => $request->user()
    ]);
});


// Route::post('/login', [AuthController::class, 'login']);
Route::post('/login', function (Request $request) {
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $validated['email'])->first();

    if (!$user || !Hash::check($validated['password'], $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    return response()->json([
        'token' => $user->createToken('YourAppName')->plainTextToken,
        'user' => $user
    ]);
});
Route::post('/register', [AuthController::class, 'register']);

Route::get('/cuisines', [ApiCuisines::class, 'index']);
Route::post('/cuisines', [ApiCuisines::class, 'store']);
Route::get('/cuisines/{cuisines}', [ApiCuisines::class, 'show']);
Route::put('/cuisines/{cuisines}', [ApiCuisines::class, 'update']);
Route::delete('/cuisines/{cuisines}', [ApiCuisines::class, 'destroy']);

Route::get('/user_favorite_cuisines', [ApiUserFavoriteCuisines::class, 'index']);
Route::post('/user_favorite_cuisines', [ApiUserFavoriteCuisines::class, 'store']);
Route::get('/user_favorite_cuisines/{userFavoriteCuisines}', [ApiUserFavoriteCuisines::class, 'show']);
Route::put('/user_favorite_cuisines/{userFavoriteCuisines}', [ApiUserFavoriteCuisines::class, 'update']);
Route::delete('/user_favorite_cuisines/{userFavoriteCuisines}', [ApiUserFavoriteCuisines::class, 'destroy']);

Route::get('/user_favorite_categories', [ApiUserFavoriteCategories::class, 'index']);
Route::post('/user_favorite_categories', [ApiUserFavoriteCategories::class, 'store']);
Route::get('/user_favorite_categories/{userFavoriteCategories}', [ApiUserFavoriteCategories::class, 'show']);
Route::put('/user_favorite_categories/{userFavoriteCategories}', [ApiUserFavoriteCategories::class, 'update']);
Route::delete('/user_favorite_categories/{userFavoriteCategories}', [ApiUserFavoriteCategories::class, 'destroy']);

Route::get('/user_disliked_ingredients', [ApiUserDislikedIngredients::class, 'index']);
Route::post('/user_disliked_ingredients', [ApiUserDislikedIngredients::class, 'store']);
Route::get('/user_disliked_ingredients/{userDislikedIngredients}', [ApiUserDislikedIngredients::class, 'show']);
Route::put('/user_disliked_ingredients/{userDislikedIngredients}', [ApiUserDislikedIngredients::class, 'update']);
Route::delete('/user_disliked_ingredients/{userDislikedIngredients}', [ApiUserDislikedIngredients::class, 'destroy']);

Route::get('/user_dietary_resctrictions', [ApiUserDietaryResctrictions::class, 'index']);
Route::post('/user_dietary_resctrictions', [ApiUserDietaryResctrictions::class, 'store']);
Route::get('/user_dietary_resctrictions/{userDietaryResctrictions}', [ApiUserDietaryResctrictions::class, 'show']);
Route::put('/user_dietary_resctrictions/{userDietaryResctrictions}', [ApiUserDietaryResctrictions::class, 'update']);
Route::delete('/user_dietary_resctrictions/{userDietaryResctrictions}', [ApiUserDietaryResctrictions::class, 'destroy']);

Route::get('/restrictions', [ApiRestrictions::class, 'index']);
Route::post('/restrictions', [ApiRestrictions::class, 'store']);
Route::get('/restrictions/{restrictions}', [ApiRestrictions::class, 'show']);
Route::put('/restrictions/{restrictions}', [ApiRestrictions::class, 'update']);
Route::delete('/restrictions/{restrictions}', [ApiRestrictions::class, 'destroy']);

Route::get('/tags', [ApiTags::class, 'index']);
Route::post('/tags', [ApiTags::class, 'store']);
Route::get('/tags/{tags}', [ApiTags::class, 'show']);
Route::put('/tags/{tags}', [ApiTags::class, 'update']);
Route::delete('/tags/{tags}', [ApiTags::class, 'destroy']);

Route::get('/categories', [ApiCategories::class, 'index']);
Route::post('/categories', [ApiCategories::class, 'store']);
Route::get('/categories/{categories}', [ApiCategories::class, 'show']);
Route::put('/categories/{categories}', [ApiCategories::class, 'update']);
Route::delete('/categories/{categories}', [ApiCategories::class, 'destroy']);

Route::get('/fav_category_ingredients', [ApiFavCategoryIngredients::class, 'index']);
Route::post('/fav_category_ingredients', [ApiFavCategoryIngredients::class, 'store']);
Route::get('/fav_category_ingredients/{favCategoryIngredients}', [ApiFavCategoryIngredients::class, 'show']);
Route::put('/fav_category_ingredients/{favCategoryIngredients}', [ApiFavCategoryIngredients::class, 'update']);
Route::delete('/fav_category_ingredients/{favCategoryIngredients}', [ApiFavCategoryIngredients::class, 'destroy']);

Route::get('/food_ingredient', [ApiFoodsIngredients::class, 'index']);
Route::post('/food_ingredient', [ApiFoodsIngredients::class, 'store']);
Route::get('/food_ingredient/{foodsIngredients}', [ApiFoodsIngredients::class, 'show']);
Route::put('/food_ingredient/{foodsIngredients}', [ApiFoodsIngredients::class, 'update']);
Route::delete('/food_ingredient/{foodsIngredients}', [ApiFoodsIngredients::class, 'destroy']);

Route::get('/food_tags', [ApiFoodsTags::class, 'index']);
Route::post('/food_tags', [ApiFoodsTags::class, 'store']);
Route::get('/food_tags/{foodsTags}', [ApiFoodsTags::class, 'show']);
Route::put('/food_tags/{foodsTags}', [ApiFoodsTags::class, 'update']);
Route::delete('/food_tags/{foodsTags}', [ApiFoodsTags::class, 'destroy']);

Route::get('/foods', [ApiFoods::class, 'index']);
Route::post('/foods', [ApiFoods::class, 'store']);
Route::get('/foods/{foods}', [ApiFoods::class, 'show']);
Route::put('/foods/{foods}', [ApiFoods::class, 'update']);
Route::delete('/foods/{foods}', [ApiFoods::class, 'destroy']);

Route::get('/ingredients', [ApiIngredients::class, 'index']);
Route::post('/ingredients', [ApiIngredients::class, 'store']);
Route::get('/ingredients/{ingredients}', [ApiIngredients::class, 'show']);
Route::put('/ingredients/{ingredients}', [ApiIngredients::class, 'update']);
Route::delete('/ingredients/{ingredients}', [ApiIngredients::class, 'destroy']);

Route::get('/restaurants', [ApiRestaurants::class, 'index']);
Route::post('/restaurants', [ApiRestaurants::class, 'store']);
Route::get('/restaurants/{restaurants}', [ApiRestaurants::class, 'show']);
Route::put('/restaurants/{restaurants}', [ApiRestaurants::class, 'update']);
Route::delete('/restaurants/{restaurants}', [ApiRestaurants::class, 'destroy']);

Route::get('/restaurant_foods', [ApiRestaurantsFoods::class, 'index']);
Route::post('/restaurant_foods', [ApiRestaurantsFoods::class, 'store']);
Route::get('/restaurant_foods/{restaurantsFoods}', [ApiRestaurantsFoods::class, 'show']);
Route::put('/restaurant_foods/{restaurantsFoods}', [ApiRestaurantsFoods::class, 'update']);
Route::delete('/restaurant_foods/{restaurantsFoods}', [ApiRestaurantsFoods::class, 'destroy']);

Route::get('/user_preferences', [ApiUserPreferences::class, 'index']);
Route::post('/user_preferences', [ApiUserPreferences::class, 'store']);
Route::get('/user_preferences/{userPreferences}', [ApiUserPreferences::class, 'show']);
Route::put('/user_preferences/{userPreferences}', [ApiUserPreferences::class, 'update']);
Route::delete('/user_preferences/{userPreferences}', [ApiUserPreferences::class, 'destroy']);

Route::get('/user', [ApiUser::class, 'index']);
Route::post('/user', [ApiUser::class, 'store']);
Route::get('/user/{user}', [ApiUser::class, 'show']);
Route::put('/user/{user}', [ApiUser::class, 'update']);
Route::delete('/user/{user}', [ApiUser::class, 'destroy']);

Route::get('/foods', [ApiFoods::class, 'index']);
Route::get('/foods/{foods}',[ApiFoods::class, 'show']);
Route::post('/foods', [ApiFoods::class, 'store']);
Route::put('/foods/{foods}', [ApiFoods::class, 'update']);
Route::delete('/foods/{foods}', [ApiFoods::class, 'destroy']);

Route::get('/user_preferences', [ApiUserPreferences::class, 'index']);
Route::get('/user_preferences/{userPreferences}',[ApiUserPreferences::class, 'show']);
Route::post('/user_preferences', [ApiUserPreferences::class, 'store']);
Route::put('/user_preferences/{userPreferences}', [ApiUserPreferences::class, 'update']);
Route::delete('/user_preferences/{userPreferences}', [ApiUserPreferences::class, 'destroy']);
Route::get('/user_preferences/by_user/{userId}', [ApiUserPreferences::class, 'getByUser']);


Route::get('/ratings', [ApiRatings::class, 'index']);
Route::get('/ratings/{ratings}',[ApiRatings::class, 'show']);
Route::post('/ratings', [ApiRatings::class, 'store']);
Route::put('/ratings/{ratings}', [ApiRatings::class, 'update']);
Route::delete('/ratings/{ratings}', [ApiRatings::class, 'destroy']);