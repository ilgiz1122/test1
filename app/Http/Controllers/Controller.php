<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Podcategory;
use App\Models\Category; // добавлена для связи с категориями 
use App\Models\Uroky;
use Illuminate\Support\Facades\DB;
use App\Models\Kupit; // добавлена для связи с категориями
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
