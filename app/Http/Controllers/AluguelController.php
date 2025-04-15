<?php

namespace App\Http\Controllers;
use App\Models\Aluguel;
use Carbon\Carbon;
use App\Http\Requests\StoreAluguel;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    public readonly Aluguel $aluguel;

    public function __construct()
    {
        $this->aluguel = new Aluguel();
    }

    public function index()
    {
        $alugueis = $this->aluguel->all();
        return view('Aluguel/aluguel', ['alugueis' => $alugueis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Aluguel/aluguel_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAluguel $request)
    {
         // Converter a data do aluguel para o formato Y-m-d
   

        $created = $this->aluguel->create([
            'nome' => $request->input('nome'),
            'locatario' => $request->input('locatario'),
            'data_aluguel' => $request->input('data_aluguel'),
            'data_devolucao' => $request->input('data_devolucao'),
        ]);

        if ($created) {
            return redirect()->route('alugueis.index')->with('message', 'Aluguel criado com sucesso');
        }

        return redirect()->route('alugueis.index')->with('message', 'Erro ao criar aluguel');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluguel $aluguel)
    {
        return view('Aluguel/aluguel_show', ['aluguel' => $aluguel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluguel $aluguel)
    {
        return view('Aluguel/aluguel_edit', ['aluguel' => $aluguel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = Aluguel::where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('alugueis.index')->with('message', 'Aluguel atualizado com sucesso');
        }

        return redirect()->route('alugueis.index')->with('message', 'Erro ao atualizar aluguel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->aluguel->where('id', $id)->delete();

        return redirect()->route('alugueis.index')->with('message', 'Aluguel deletado com sucesso');
    }
}

