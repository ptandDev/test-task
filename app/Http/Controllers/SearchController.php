<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SearchController extends Controller
{
    public function __invoke(Request $request, Series $model)
    {
        $search = $request->input('s');
        $data = $model->getSearch($search);

        return view('search', ['data' => $data]);
    }
}
