<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\City;
use App\State;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $city = DB::table('cities')->join('states', 'cities.state_id', '=', 'states.id')
            ->select('cities.id','cities.nome_ci' ,'states.sigla', 'cities.habitante')->get();

        return view('city/index', ['city' => $city]);
    }

    public function create() 
    {
        $State = State::all();
        return view('city/new', ['states' => $State]);
    }

    public function store(Request $request) 
    {
        $p = new city;
        $p->nome_ci = $request->input('nome');
        $p->habitante = $request->input('habitante');
        $p->state_id = $request->input('id_estado');
        
        if ($p->save()) {
            \Session::flash('status', 'Cidade criado com sucesso.');
            return redirect('/city');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o Cidade.');
            return view('city.new');
        }
    }

    public function edit($id) {
        $city = city::findOrFail($id);
        $State = State::all();

        return view('city.edit', ['city' => $city] ,['states' => $State]);
    }

    public function delete($id) {
        $city = city::findOrFail($id);

        return view('city.delete', ['city' => $city]); 
    }

    public function update(Request $request, $id) {
        $p = city::findOrFail($id);
        $p->nome_ci = $request->input('nome');
        $p->habitante = $request->input('habitante');
        $p->state_id = $request->input('id_estado');
        
        if ($p->save()) {
            \Session::flash('status', 'Cidade atualizado com sucesso.');
            return redirect('/city');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar a Cidade.');
            return view('city.edit', ['city' => $p]);
        }
    }

    public function destroy($id) {
        $p = city::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Cidade excluído com sucesso.');
        return redirect('/city');
    }
}
