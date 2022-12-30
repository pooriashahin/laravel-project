<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function show (Listings $listing) {
        return view('listing', [
            'listing' => $listing,
        ]);
    }

    public function index () {
        return view('listings', [
            'listings' => Listings::all()
        ]);
    }
}
