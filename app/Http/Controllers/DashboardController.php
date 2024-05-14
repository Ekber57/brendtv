<?php
namespace App\Http\Controllers;

use App\Actions\DashboardAction;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {
    public function index(DashboardAction $dashboardAction) {
        return $dashboardAction->index();
    }
}




?>