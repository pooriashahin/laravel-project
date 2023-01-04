<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use App\Models\MongoListing;
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
//        return response()->json(Listings::latest()->filter(request(['tag', 'search']))->paginate(6));
        return view('listings.index', [
            'listings' => Listings::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function indexMongoListing () {
//        return response()->json(MongoListing::latest()->filter(request(['tag', 'search']))->paginate(6));
        return view('listings.index', [
            'listings' => MongoListing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function manage () {
        return view('listings.manage', [
            'listings' => auth()->user()->listings()->get(),
        ]);
    }

    public function create () {
        return view('listings.create');
    }

    public function edit (Listings $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }

    public function update (Request $request, Listings $listing) {
        if(auth()->id() != $listing->user_id) {
            abort(403, 'Unauthorized action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $mongoListing = MongoListing::where('listing_id', '=' , $listing->id)->firstOrFail();

        $mongoListing->update($formFields);
        $listing->update($formFields);

        return back()->with('message', 'Listing Updated Successfully!');
    }

    public function destroy(Request $request, Listings $listing) {
        if(auth()->id() != $listing->user_id) {
            abort(403, 'Unauthorized action');
        }

        $mongoListing = MongoListing::where('listing_id', '=' , $listing->id)->firstOrFail();

        $mongoListing->delete();
        $listing->delete();

        return redirect('/')->with('message', 'Listing Deleted Successfully!');
    }

    public function store (Request $request) {

        $formFields = $request->validate([
            'title' => 'required',
            'company' =>['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email', Rule::unique('listings', 'email')],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $listing = Listings::create($formFields);
        $formFields['listing_id'] = $listing->id;
        MongoListing::create($formFields);

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }
}
