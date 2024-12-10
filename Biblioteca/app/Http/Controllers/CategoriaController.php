<?php

namespace App\Http\Controllers;

use App\Exports\CategoriaExport;
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriaCollection;
use App\Models\Categoria;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $type = $request->input('type', 'asc');

        $validSort = ['nombre', 'created_at', 'id'];

        if (! in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";

            return response()->json(['error' => $message], 400);
        }

        $validType = ['asc', 'desc'];

        if (! in_array($type, $validType)) {
            $message = "Invalid sort type: $type";

            return response()->json(['error' => $message], 400);
        }

        $categorias = Categoria::orderBy($sort, $type)->paginate(5);

        return response()->json(new CategoriaCollection($categorias), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate((new CategoriaRequest)->rules());

        $categoria = Categoria::create($validated);

        return response()->json(['data' => $categoria], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return response()->json(['data' => $categoria], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate((new CategoriaRequest)->rules());

        $categoria->update($validated);

        return response()->json(['data' => $categoria], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return response(null, 204);
    }

    /**
     * Export the specified resource in the given format.
     */
    public function export($format)
    {
        $categorias = Categoria::all();
        if ($format === 'excel') {
            $export = new CategoriaExport;

            return $export->export();
        } elseif ($format === 'pdf') {
            $pdf = PDF::loadView('exports.categorias_pdf', compact('categorias'));

            return $pdf->download('categorias.pdf');
        }

        return redirect()->back()->with('error', 'Formato no soportado');
    }
}
