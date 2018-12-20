<?php

namespace App\Http\Controllers;

use App\Services\Parser;
use App\Models\Series;

class ParseController extends Controller
{
    private $parser;
    private $model;

    public function __construct()
    {
        $this->parser = new Parser();
        $this->model = new Series();

    }

    public function run()
    {
        $data = $this->parser->getData();
        $save = $this->model->saveData($data);

        if ($save) return true;
        else return false;
    }
}
