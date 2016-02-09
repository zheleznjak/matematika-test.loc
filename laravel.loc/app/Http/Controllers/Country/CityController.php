<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\City;
use App\Country;
use App\Language;
use App\Http\Requests;
use Illuminate\Http\Exception;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($country_id)
    {
        $statusCode = 200;
        $response = [
            'cities' => []
        ];
        Country::findOrFail($country_id);
        $cities = City::with('country')->where('country_id', '=', $country_id)->get();

        foreach ($cities as $city) {
            $response['cities'][] = [
                'id'         => $city->id,
                'city'       => $city->city,
                'country_id' => $country_id,
                'country'    => $city->country->country,
            ];
        }

        return response($response, $statusCode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($country_id)
    {
        $countries = Country::where('id', '=', $country_id)->get();
        $languages = Language::all();

        return view('createCity',
            ['countries'  => $countries,
             'languages'  => $languages,
             'country_id' => $country_id,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'city'    => 'required',
            'country' => 'required|exists:countries,id',
            //'language' => 'required|exists:languages,id',
        ]);

        $city = new City;
        $city->city = $request->city;
        $city->country_id = $request->country;
        $city->save();

        foreach ($request->language as $language_id) {
            $city->language()->attach($language_id);
        }

        $statusCode = 200;
        $response = [
            "success" => "City $request->city successfully created"
        ];

        return response($response, $statusCode);
    }
}