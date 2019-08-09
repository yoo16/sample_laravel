<?php

namespace LaravelSample\Http\Controllers\Sample;

use LaravelSample\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleController extends Controller
{

    public function index(Request $request)
    {
        $data = ['msg' => 'Sample index'];
        return view('hello.index', $data);
    }

    public function other(Request $request)
    {
        $data = ['msg' => 'Sample Other'];
        return view('hello.index', $data);
    }

}
