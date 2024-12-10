<?php

namespace App\Http\Controllers;

use App\Exports\ClienteExport;
use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Http\Resources\ClienteCollection;
use App\Models\Cliente;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $type = $request->input('type', 'asc');

        $validSort = ['numero_documento', 'ciudad', 'id', 'direccion', 'telefono', 'created_at'];

        if (! in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";

            return response()->json(['error' => $message], 400);
        }

        $validType = ['asc', 'desc'];

        if (! in_array($type, $validType)) {
            $message = "Invalid sort type: $type";

            return response()->json(['error' => $message], 400);
        }

        $clientes = Cliente::with('user')->orderBy($sort, $type)->paginate(5);

        return response()->json(new ClienteCollection($clientes), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate((new ClienteRequest)->rules());

        $cliente = Cliente::create($validated);

        return response()->json(['data' => $cliente], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        $cliente->load('user');

        return response()->json(['data' => $cliente], 200);
    }

    public function perfil()
    {
        $user = User::with('cliente')->find(Auth::id());
        $cliente = $user->cliente;

        return response()->json(['data' => $cliente], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate((new ClienteUpdateRequest)->rules());

        $cliente->update($validated);

        return response()->json(['data' => $cliente], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return response(null, 204);
    }

    /**
     * Export the specified resource in the given format.
     */
    public function export($format)
    {
        $clientes = Cliente::with('user')->get();
        if ($format === 'excel') {
            $export = new ClienteExport;

            return $export->export();
        } elseif ($format === 'pdf') {
            $pdf = PDF::loadView('exports.clientes_pdf', compact('clientes'));

            return $pdf->download('clientes.pdf');
        }

        return redirect()->back()->with('error', 'Formato no soportado');
    }
}
