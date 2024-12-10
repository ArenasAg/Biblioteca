<?php

namespace App\Http\Controllers;

use App\Exports\InformeExport;
use App\Http\Requests\InformeRequest;
use App\Http\Resources\InformeCollection;
use App\Models\Informe;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $type = $request->input('type', 'asc');

        $validSort = ['fecha', 'tipo_informe', 'id', 'created_at'];

        if (! in_array($sort, $validSort)) {
            $message = "Invalid sort field: $sort";

            return response()->json(['error' => $message], 400);
        }

        $validType = ['asc', 'desc'];

        if (! in_array($type, $validType)) {
            $message = "Invalid sort type: $type";

            return response()->json(['error' => $message], 400);
        }

        $informes = Informe::orderBy($sort, $type)->paginate(5);

        return response()->json(new InformeCollection($informes), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate((new InformeRequest)->rules());

        $informe = Informe::create($validated);

        return response()->json(['data' => $informe], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Informe $informe)
    {
        return response()->json(['data' => $informe], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informe $informe)
    {
        $validated = $request->validate((new InformeRequest)->rules());

        $informe->update($validated);

        return response()->json(['data' => $informe], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informe $informe)
    {
        $informe->delete();

        return response(null, 204);
    }

    /**
     * Export the specified resource in the given format.
     */
    public function export($format)
    {
        $informes = Informe::all();
        if ($format === 'excel') {
            $export = new InformeExport;

            return $export->export();
        } elseif ($format === 'pdf') {
            $pdf = PDF::loadView('exports.informes_pdf', compact('informes'));

            return $pdf->download('informes.pdf');
        }

        return redirect()->back()->with('error', 'Formato no soportado');
    }
}
