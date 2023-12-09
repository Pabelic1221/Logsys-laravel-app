<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getData()
    {
        // Your data retrieval logic here
        // For example, fetching data from a model

        $data = ['item1', 'item2', 'item3'];

        return response()->json(['data' => $data], 200);
    }
}
