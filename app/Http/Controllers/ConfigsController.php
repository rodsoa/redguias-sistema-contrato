<?php

namespace App\Http\Controllers;

use App\Domain\Models\Tables\Config;
use Illuminate\Http\Request;

class ConfigsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function edit()
    {
        $config = Config::first();
        return view('config', compact('config'));
    }

    public function update(Request $request)
    {
        $config = Config::first();

        $config->fill($request->all());
        $config->save();

        return redirect()->route('configs.edit')->with([
            'status' => 'success',
            'message' => 'Emails atualizados com sucesso'
        ]);
    }
}
