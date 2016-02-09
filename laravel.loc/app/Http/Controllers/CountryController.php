<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Country;
use App\City;
use App\Language;
use App\Http\Requests;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusCode = 200;
        $response = [
            'countries' => []
        ];
        $countries = Country::all();

        foreach ($countries as $country) {

            $response['countries'][] = [
                'id'      => $country->id,
                'country' => $country->country,
            ];
        }

        return response($response, $statusCode);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCountry');
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
            'country' => 'required|unique:countries',
        ]);

        $country = new Country;
        $country->country = $request->country;
        $country->save();

        $statusCode = 200;
        $response = [
            "success" => "Country $country->country successfully created"
        ];

        return response($response, $statusCode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $country = Country::findOrFail($id);
        $statusCode = 200;
        $response = ["country" => [
            'id'      => $country->id,
            'country' => $country->country,
        ]];

        return response($response, $statusCode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);

        return view('editCountry', ['id' => $id, 'country' => $country->country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'country' => 'required|unique:countries',
            'id'      => 'required|exists:countries,id'
        ]);
        $country = Country::findOrFail($id);
        $country->country = $request->country;
        $country->save();

        $statusCode = 200;
        $response = [
            "success" => "Country $country->country successfully updated"
        ];

        return response($response, $statusCode);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        $statusCode = 200;

        $response = [
            "success" => "Country $id successfully destroyed"
        ];

        return response($response, $statusCode);
    }
}
