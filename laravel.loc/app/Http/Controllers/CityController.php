<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        $statusCode = 200;
        $response = [
            'cities' => []
        ];
        $cities = City::with('country')->get();

        foreach ($cities as $city) {

            $response['cities'][] = [
                'id'         => $city->id,
                'city'       => $city->city,
                'country_id' => $city->country_id,
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
    public function create()
    {
        $countries = Country::all();
        $languages = Language::all();

        return view('createCity',
            ['countries' => $countries,
             'languages' => $languages,
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
            'city'    => 'required|unique',
            'country' => 'required|exists:cities,country_id',
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
            "success" => "City successfully created"
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
        $city = City::with('country')->findOrFail($id);
        $statusCode = 200;
        $response = ["city" => [
            'id'         => $city->id,
            'city'       => $city->city,
            'country_id' => $city->country_id,
            'country'    => $city->country->country,
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
        $city = City::findOrFail($id);
        $country = Country::all();
        $language = Language::all();
        $languages_cur = $city->language;
        foreach ($languages_cur as $language_cur) {
            $lang[] = $language_cur['id'];
        }

        return view('editCity', [
            'id'            => $id,
            'city'          => $city->city,
            'country_cur'   => $city->country_id,
            'languages_cur' => $lang,
            'countries'     => $country,
            'languages'     => $language,
        ]);
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
            'city' => 'required|unique',
            'id'   => 'required|exists:cities,id',
            //'country' => 'required|exists:countries,id',
        ]);
        $city = City::findOrFail($id);
        $city->city = $request->city;
        $city->country_id = $request->country;
        $city->save();

        $city->language()->sync($request->language);

        $statusCode = 200;
        $response = [
            "success" => "City id = $id successfully updated"
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
        $city = City::findOrFail($id);

        $city->language()->detach([$id]);

        $city->delete();

        $statusCode = 200;

        $response = [
            "success" => "City $id successfully destroyed"
        ];

        return response($response, $statusCode);
    }
}
