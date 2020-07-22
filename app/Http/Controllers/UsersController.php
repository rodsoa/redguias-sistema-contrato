<?php

namespace App\Http\Controllers;

use App\Domain\Models\Tables\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $user->assignRole('employee');
        $user->save();

        return redirect()->route('users.index')->with([
            'status' => 'sucess',
            'message' => 'Usuário adicionado com sucesso'
        ]);
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::findOrFail($id);

        if ( isset($data['password']) ) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('users.index')->with([
            'status' => 'sucess',
            'message' => 'Usuário adicionado com sucesso'
        ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        foreach ($user->agreements as $agreement) {
            $agreement->delete();
        }

        $user->delete();
        return redirect()->route('users.index')->with([
            'status' => 'sucess',
            'message' => 'Usuário deletado com sucesso'
        ]);
    }
}
