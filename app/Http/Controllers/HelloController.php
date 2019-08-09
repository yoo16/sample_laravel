<?php

namespace LaravelSample\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{

    public function index(Request $request)
    {
        $data = ['msg' => $request->hello];
        return view('hello.index', $data);
    }

    public function bye(Request $request)
    {
        $data = ['msg' => $request->bye];
        return view('hello.index', $data);
    }

    public function other()
    {
        return redirect()->route('test');
    }

    public function user($id)
    {
        $data = ['id' => $id];
        return view('hello.user', $data);
    }

}
