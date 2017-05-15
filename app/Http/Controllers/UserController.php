<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->validate(request(), [
            'page' => 'integer', 'perpage' => 'integer'
        ]);

        $perpage = Input::get('perpage', 20);
        $query = Input::get('query', '');

        return User::where('name', 'like', $query . '%')->paginate($perpage)->toJson();
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
        return User::find($id)->toJson();
    }

    /**
     * @return mixed
     * @throws AuthorizationException
     */
    public function getLoggedIn() {
        if (!auth()->check()) {
            throw new AuthorizationException;
        }

        return auth()->user()->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws AuthorizationException
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('user-update')) {
            throw new AuthorizationException;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('user-update')) {
            throw new AuthorizationException;
        }
    }
}
