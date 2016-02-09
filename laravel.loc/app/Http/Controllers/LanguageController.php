<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Language;
use App\City;
use App\Country;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class LanguageController extends Controller
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
            'languages' => []
        ];
        $languages = Language::all();

        foreach ($languages as $language) {

            $response['languages'][] = [
                'id'      => $language->id,
                'language' => $language->language,
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
        return view('createLanguage');
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
            'language' => 'required|unique:languages',
        ]);

        $language = new Language;
        $language->language = $request->language;
        $language->save();

        $statusCode = 200;
        $response = [
            "success" => "Language $request->language successfully created"
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
        $language = Language::findOrFail($id);
        $statusCode = 200;
        $response = ["language" => [
            'id'      => $language->id,
            'language' => $language->language,
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
        $language = Language::findOrFail($id);

        return view('editLanguage', ['id' => $id, 'language' => $language->language]);
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
            'language' => 'required|unique:languages,language',
            'id'      => 'required|exists:languages,id'
        ]);
        $language = Language::findOrFail($id);
        $language->language = $request->language;
        $language->save();

        $statusCode = 200;
        $response = [
            "success" => "Language id = $id successfully updated"
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
        $language = Language::findOrFail($id);
        $language->city()->detach();
        $language->delete();

        $statusCode = 200;

        $response = [
            "success" => "Language $id successfully destroyed"
        ];

        return response($response, $statusCode);
    }
}
