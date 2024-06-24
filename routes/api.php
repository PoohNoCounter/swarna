<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDataApiController;

Route::resource('data', AdminDataApiController::class, ['only', ['index', 'store', 'edit', 'update', 'destroy']]);