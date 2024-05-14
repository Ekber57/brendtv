<?php





use App\Models\IpTV\Line;
use App\DTOS\IpTv\UserDTO;
use App\Actions\UserAction;
use App\externalAPIs\IpTv\UserAPi;
use Illuminate\Support\Facades\App;
use App\externalAPIs\IpTv\CustomAPI;
use Illuminate\Support\Facades\Auth;
use App\Actions\IpTv\DashboardAction;
use App\Actions\IpTv\OnlineLineAction;
use App\Services\IpTv\BouquetService;
use Illuminate\Support\Facades\Route;
use App\externalAPIs\ipTv\BouquetsAPI;
use App\externalAPIs\IpTv\PackagesAPI;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IpTv\LineController;
use App\Http\Controllers\IpTv\ResellerController;
use App\Http\Controllers\IpTv\ResellerEditController;
use App\Services\IpTv\LineService;
use App\Services\IpTv\ResellerService;
use App\Services\IpTv\UserBindingService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("/",function() {
(new OnlineLineAction(new ResellerService(),new LineService(),new UserBindingService()))->findLinesForReseller();
// return (new BouquetAction(new BouquetService(), new BouquetsAPI()))->sync();
});




// Route::get("/dashboard",[DashboardController::class,"index"]);
Route::get("/dashboard",function() {
    if(!Auth::check()) {
        return redirect()->route('sign_in');
    }
    $user = Auth::user();
    $line = Line::where('username',$user->username)->first();
    return  view("dashboard",[
        "line" => $line,
        "user" => $user,
        "packages" => (new PackagesAPI())->getPackages(),
        "connections"=> (new CustomAPI())->getOnlineLines(array(6715))

    ]);
});




Route::get('/reseller/lines',[LineController::class,"show"]);
Route::get('/reseller/lines/create',[LineController::class,"create"])->name("create_line");
Route::post('/reseller/lines/store',[LineController::class,"store"]);
Route::get('/reseller/packages/show',[ResellerController::class,"showPackages"]);
Route::post('/reseller/packages/edit',[ResellerController::class,"editPackages"]);

// Users 




Route::get("/users",function () {
    return (new UserAction())->showUsers();
});



// reseller

Route::get('/reseller/create',[ResellerController::class,"createReseller"])->name("create_reseller");
Route::get('/subreseller/create',[ResellerController::class,"createSubreseller"])->name("create_subreseller");
Route::post('/reseller/create',[ResellerController::class,"storeReseller"]);
Route::post('/subreseller/create',[ResellerController::class,"storeSubreseller"]);
Route::get('/reseller/get_subresellers',[ResellerController::class,"getSubresellers"])->name("subresellerlist");
Route::get('/reseller/get_resellers',[ResellerController::class,"getResellers"])->name("resellerlist");
// Route::get('/system/user/edit/{user}',[AuthController::class,"editUser"])->name("edit_user");
// Route::post('/system/user/edit',[AuthController::class,"storeUser"])->name("store_user");


Route::get("reseller/edit/{user}",[ResellerEditController::class,"editReseller"]);
Route::post("reseller/edit",[ResellerEditController::class,"storeReseller"]);

Route::get("subreseller/edit/{user}",[ResellerEditController::class,"editSubreseller"]);
Route::post("subreseller/edit",[ResellerEditController::class,"storeSubreseller"]);











Route::get("package_list",function(){
return view("packagelist",["packages" => (new PackagesAPI())->getPackages()]);
});






Route::get("/read_messages",function() {
    return view("readmessage");
});


Route::get("/messages",function() {
    return view("messages");
});





// AUTH ROUTES START
Route::get("/logout",[AuthController::class,"logout"]);
Route::post("/signup",[AuthController::class,"register"]);
Route::post("/signin",[AuthController::class,"login"])->name("sign_in");
Route::get('/signup',function() {
    return view("auth.signup");
}); 
Route::get('/signin',function() {
    return view('auth.signin');
}); 

// Lang RUTES START


Route::get('/change_lang/{lang}',function  ($lang) {
    session(['locale' => $lang]);
    
    App::setlocale($lang);
     return redirect()->back();
});









