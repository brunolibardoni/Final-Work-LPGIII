<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $State = State::all();

        return view('states/index', ['states' => $State]);
    }

    public function create() 
    {
        return view('states/new');
    }

    public function store(Request $request) 
    {
        $p = new State;
        $p->nome_es = $request->input('nome');
        $p->sigla = $request->input('sigla');

        
        if ($p->save()) {
            \Session::flash('status', 'Estado criado com sucesso.');
            return redirect('/state');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o estado.');
            return view('states.new');
        }
    }

    public function edit($id) {
        $State = State::findOrFail($id);

        return view('states.edit', ['states' => $State]);
    }

    public function delete($id) {
        $State = State::findOrFail($id);

        return view('states.delete', ['states' => $State]); 
    }

    public function update(Request $request, $id) {
        $p = State::findOrFail($id);
        $p->nome_es = $request->input('nome');
        $p->sigla = $request->input('sigla');

        
        if ($p->save()) {
            \Session::flash('status', 'Estado atualizado com sucesso.');
            return redirect('/state');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o Estado.');
            return view('states.edit', ['states' => $p]);
        }
    }

    public function destroy($id) {
        $p = State::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Estado excluído com sucesso.');
        return redirect('/state');
    }
}