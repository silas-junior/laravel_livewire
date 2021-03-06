<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $user, $request;

    public function __construct(User $user, Request $request)
    {

        $this->user = $user;
        $this->request = $request;
    }

    public function index()
    {
        $users = $this->user->orderBy('id')->get();

        return response()->json($users);
    }

    public function store()
    {
        $this->request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users|email ',
            'birth_date' => 'date_format:d-m-Y',
        ]);

        $user = new $this->user;
        $user->fill($this->request->all());
//        $date = $this->request->get('birth_date');
//        $user->birth_date = date_format($date, 'd/m/Y');
        $user->save();

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return response()->json($user);
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
