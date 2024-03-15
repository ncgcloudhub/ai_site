<?php

use App\Http\Controllers\Backend\CustomTemplateController;
use App\Http\Controllers\SSOController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\OpenAIController;
use App\Http\Controllers\CustomCategoryTemplateController;
use App\Http\Controllers\CustomCategroyTemplateController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\AIGenerateImageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get("/login", function( Request $request) {

    $clientId = config('app.client_id');

    $redirecturi = config('app.redirect_uri');

    $baseUrl = config('app.base_url');

    
    $request->session()->put("state", $state = Str::random(40));

    $query = http_build_query([
    "client_id" => $clientId,
    "redirect_uri" => $redirecturi,
    "response_type" => "code",
    "scope" => "",
    "state" => $state // Use the defined $state variable
]);

return redirect($baseUrl . "/oauth/authorize?" . $query);

});

Route::get("/callback", function (Request $request) {
    $state = $request->session()->pull("state");
    // dd($state);
    $clientId = config('app.client_id');
    $clientSecret = config('app.client_secret');
    $redirecturi = config('app.redirect_uri');
    $baseUrl = config('app.base_url');
    // throw_unless(strlen($state) > 0 && $state = $request->state, InvalidArgumentException::class);

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class,
        'Invalid state value.'
    );

    $response = Http::asForm()->post($baseUrl . "/oauth/token", 
    [
        "grant_type" => "authorization_code",
        "client_id" => $clientId,
        "client_secret" => $clientSecret,
        "redirect_uri" => $redirecturi,
        "code" => $request->code
    ]);
    
    // Handle the response
    $request->session()->put($response->json());
    return redirect("/authuser");
});

Route::get("/authuser", function(Request $request) {
    $access_token = $request->session()->get("access_token"); // Set your access token here
    $baseUrl = config('app.base_url');
    $response = Http::withHeaders([
        "Accept" => "application/json",
        "Authorization" => "Bearer " . $access_token
    ])->get($baseUrl . "/api/user");
        
    $reponses = $response->json();

    // dd($response->json());
    // Handle the response
    return view('index', compact('reponses'));
});

// LOGOUT
Route::get("/logout", function(Request $request) {
    // Revoke the access token
    $access_token = $request->session()->get("access_token");
    $baseUrl = config('app.base_url');
    if ($access_token) {
        $response = Http::withHeaders([
            "Accept" => "application/json",
            "Authorization" => "Bearer " . $access_token
        ])->post($baseUrl . "/oauth/revoke");

        // Handle the response
        if ($response->successful()) {
            // Clear the session
            $request->session()->forget("access_token");
            // You might want to redirect to a logged out page or somewhere else
            return redirect("/logged-out");
        } else {
            // Handle errors appropriately
            // For instance, if the token is already expired or revoked
            return response()->json(["error" => "Unable to revoke access token"], $response->status());
        }
    } else {
        // Handle the case where there's no access token in the session
        return redirect("/login");
    }
});

Route::get("/logged-out", function() {
    return view('auth.login'); // You may create a view for the logged out page
});


Route::get('/openaisettings/view', [OpenAIController::class, 'OpenAIsettingsView'])->name('openai.settings.view');

Route::post('/openaisettings/store', [OpenAIController::class, 'StoreOpenAIsettings'])->name('openai.settings.store');

Route::get('/write', function () {
    $title = '';
    $content = '';
    return view('backend.openai.writer', compact('title', 'content'));
})->name('openai.write');

Route::post('/write/generate', [OpenAIController::class, 'openaigenerate'])->name('openai.generate');

// Route::get('/blog/generate', [OpenAIController::class, 'BlogGenerate'])->name('blog.generate');

Route::get('/custom/category/add', [CustomCategoryTemplateController::class, 'CustomCategoryTemplateAdd'])->name('custom.category.add');

Route::post('/custom/category/store', [CustomCategoryTemplateController::class, 'CustomCategoryTemplateStore'])->name('custom.category.store');

Route::get('/custom/template/add', [CustomTemplateController::class, 'CustomTemplateAdd'])->name('custom.template.add');

Route::post('/custom/template/store', [CustomTemplateController::class, 'CustomTemplateStore'])->name('custom.template.store');

Route::get('/custom/template/manage', [CustomTemplateController::class, 'CustomTemplateManage'])->name('custom.template.manage');

Route::get('/custom/template/view/{id}', [CustomTemplateController::class, 'CustomTemplateView'])->name('custom.template.view');




// CHAT
Route::get('/expert/add', [ExpertController::class, 'ExpertAdd'])->name('expert.add');
Route::post('/expert/store', [ExpertController::class, 'ExpertStore'])->name('expert.store');



// TEST CHAT
Route::get('/chat', [ExpertController::class, 'index'])->name('chat');
Route::get('/expert/{id}', [ExpertController::class, 'ExpertChat'])->name('expert.chat');
Route::post('/chat', [ExpertController::class, 'SendMessages']);


// AI Image Generate

Route::get('/generate/image/view', [AIGenerateImageController::class, 'AIGenerateImageView'])->name('generate.image.view');

Route::post('/generate/image', [AIGenerateImageController::class, 'generateImage'])->name('generate.image');