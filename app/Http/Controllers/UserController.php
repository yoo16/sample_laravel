<?php

namespace LaravelSample\Http\Controllers;

use LaravelSample\User;
use \Illuminate\Database\QueryException;
use LaravelSample\Http\Requests\UserStoreRequest;
use LaravelSample\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    static $user_limit = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->flush();
        //$user = DB::table('users')->get();
        $users = User::orderBy('id')->paginate(self::$user_limit);
        //$user = User::paginate(self::$user_limit, ['*'], 'page', $request->page);
        //$user = DB::table('users')->paginate(self::$user_limit, ['*'], 'user_page', $request->page);
        $data = ['users' => $users];
        return view('user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$user = new User;
        //$data['user'] = $user;
        //return view('user.create', $data);
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $request->session()->put('request', $request->all());
        try {
            User::create($request->validated());
            return redirect('user');
        } catch (QueryException $e) {
            return back()->withInput();
        }
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
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->session()->has('request')) {
            $user->fill($request->session()->get('request'));
        }
        $data['user'] = $user;
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->all();
        $request->session()->put('request', $data);
        try {
            $user = User::find($id);
            $user->fill($request->all())->save();
            $request->session()->flush();
        } catch (QueryException $e) {
            $request->session()->put('errors', ['save_error']);
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user');
    }
}
