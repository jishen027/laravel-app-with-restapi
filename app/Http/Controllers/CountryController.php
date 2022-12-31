<?php

namespace App\Http\Controllers;

use App\Models\Country;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    // get all countries
    public function getCountries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    // get country by id
    public function getCountry($id)
    {
        $country = Country::find($id);
        return response()->json($country);
    }

    // add country
    public function addCountry(Request $request)
    {
        $country = new Country();
        $country->name = $request->name;
        $country->save();
        return response()->json(['message' => 'Country added successfully']);
    }

    // update country
    public function updateCountry(Request $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->name;
        $country->save();
        return response()->json(['message' => 'Country updated successfully']);
    }

    // delete country
    public function deleteCountry($id)
    {
        $country = Country::find($id);
        $country->delete();
        return response()->json(['message' => 'Country deleted successfully']);
    }

    // get all products from country
    public function getProductsFromCountry($id)
    {
        $country = Country::find($id);
        $products = $country->products;
        return response()->json($products);
    }
}
