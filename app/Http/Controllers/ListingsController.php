<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingsController extends Controller
{
    public function show (Listings $listing) {
        return view('listings.show', [
            'listing' => $listing,
        ]);
    }

    public function index () {
        return view('listings.index', [
            'listings' => Listings::latest()->filter(request(['tag', 'search']))->paginate(2)
        ]);
    }

    public function create () {
        return view('listings.create');
    }

    public function store (Request $request) {
//        dd($request->all());
        $forFields = $request->validate([
            'title' => 'required',
            'company' =>['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email', Rule::unique('listings', 'email')],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        Listings::create($forFields);

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }
}
