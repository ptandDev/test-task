<?php

namespace App\Http\Controllers;

use App\Models\Series;

class MainController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Series();
    }

    public function index()
    {
        $data = $this->model->orderBy('date', 'desc')->paginate(10);

        return view('main', ['data' => $data]);
    }
}
