<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorOwnerController extends Controller
{
    public function index()
    {
        return view('vendors.vendorOwner.index');
    }
}
