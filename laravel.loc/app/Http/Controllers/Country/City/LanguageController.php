<?php

namespace App\Http\Controllers\Country\City;

use Illuminate\Http\Request;

use App\City;
use App\Country;
use App\Language;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($country_id, $city_id)
    {
        $statusCode = 200;

        $city = City::with(['country'])->findOrFail($city_id);
        if($city->country->id != $country_id)
        {
            throw new ModelNotFoundException;
        }

        $languages = City::findOrFail($city_id)->language()->get();
        foreach ($languages as $language) {
            $response['languages'][] = [
                'id'       => $language->id,
                'language' => $language->language,
                //'country_id' => $country_id,
                //'country'    => $city->country->country,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
