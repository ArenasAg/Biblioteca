<?php

namespace App\Http\Controllers;

use App\Exports\InventarioExport;
use App\Http\Requests\InventarioRequest;
use App\Http\Resources\InventarioCollection;
use App\Models\Inventario;
use App\Models\InventarioDetalle;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $type = $request->input('type', 'asc');

        $validSort = ['fecha', 'tipo_movimiento', 'created_at', 'id'];

        if (! in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";

            return response()->json(['error' => $message], 400);
        }

        $validType = ['asc', 'desc'];

        if (! in_array($type, $validType)) {
            $message = "Invalid sort type: $type";

            return response()->json(['error' => $message], 400);
        }

        $inventarios = Inventario::with('detalles.libro')->orderBy($sort, $type)->paginate(5);

        return response()->json(new InventarioCollection($inventarios), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate((new InventarioRequest)->rules());

        $inventario = Inventario::create($validated);

        foreach ($request->libro_id as $index => $libro_id) {
            InventarioDetalle::create([
                'inventario_id' => $inventario->id,
                'libro_id' => $libro_id,
                'cantidad' => $request->cantidad[$index],
            ]);
        }

        return response()->json(['data' => $inventario], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        $inventario->load('detalles.libro');

        return response()->json(['data' => $inventario], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {
        $validated = $request->validate((new InventarioRequest)->rules());

        $inventario->update($validated);

        InventarioDetalle::where('inventario_id', $inventario->id)->delete();

        foreach ($request->libro_id as $index => $libro_id) {
            InventarioDetalle::create([
                'inventario_id' => $inventario->id,
                'libro_id' => $libro_id,
                'cantidad' => $request->cantidad[$index],
            ]);
        }

        return response()->json(['data' => $inventario], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        InventarioDetalle::where('inventario_id', $inventario->id)->delete();
        $inventario->delete();

        return response(null, 204);
    }

    /**
     * Export the specified resource in the given format.
     */
    public function export($format)
    {
        $inventarios = Inventario::with('detalles')->get();
        if ($format === 'excel') {
            $export = new InventarioExport;

            return $export->export();
        } elseif ($format === 'pdf') {
            $pdf = PDF::loadView('exports.inventarios_pdf', compact('inventarios'));

            return $pdf->download('inventarios.pdf');
        }

        return redirect()->back()->with('error', 'Formato no soportado');
    }
}
