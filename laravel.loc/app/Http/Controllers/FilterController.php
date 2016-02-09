<?php
/**
 * Created by PhpStorm.
 * User: vladimir
 * Date: 04.02.16
 * Time: 21:55
 */
namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests;

class FilterController extends Controller
{
    /**
     * Get countries list
     *
     * @return view
     */
    public function index()
    {
        $countries = Country::all();

        return view('filter', ['countries' => $countries,]);
    }
}