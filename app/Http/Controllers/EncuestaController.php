<?php

namespace App\Http\Controllers;
use App\Models\Encuesta;
use App\Models\Opcion;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Encuesta::query();
    
        // Filtro por título o descripción (si existe)
        if ($request->filled('search')) {
             $query->where(function ($subquery) use ($request) {
             $subquery->where('titulo', 'like', '%' . $request->search . '%')
                         ->orWhere('descripcion', 'like', '%' . $request->search . '%');
            });
        }
    
        // Filtro por categoría (si existe)
        if ($request->filled('category')) {
            $query->where('categoria', $request->category);
        }
    
        // Obtener encuestas con paginación
        $encuestas = $query->paginate(10);
    
        return view('encuestas.index', compact('encuestas'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('encuestas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'required|string',
            'opciones' => 'required|array|min:2',
            'opciones.*' => 'required|string|max:255',
        ]);
    
        // Guardar la encuesta
        $encuesta = Encuesta::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
        ]);
    
        // Guardar las opciones asociadas a la encuesta
        foreach ($request->opciones as $opcion) {
            $encuesta->opciones()->create(['opcion' => $opcion]);
        }
    
        return redirect()->route('encuestas.index')
                         ->with('success', 'Encuesta creada con éxito');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $encuesta = Encuesta::with('opciones')->findOrFail($id);
        return view('encuestas.show', compact('encuesta'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $encuesta = Encuesta::findOrFail($id);
        return view('encuestas.edit', compact('encuesta'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria' => 'required|string',
            'opciones' => 'required|array|min:2',
            'opciones.*' => 'required|string|max:255',
        ]);
    
        $encuesta = Encuesta::findOrFail($id);
    
        // Actualizar los datos de la encuesta
        $encuesta->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
        ]);
    
        // Eliminar las opciones antiguas
        $encuesta->opciones()->delete();
    
        // Guardar las nuevas opciones
        foreach ($request->opciones as $opcion) {
            $encuesta->opciones()->create(['opcion' => $opcion]);
        }
    
        return redirect()->route('encuestas.index')->with('success', 'Encuesta actualizada con éxito');
    }    
    
    /**
     * Remove the specified resource from storage.
     */
    public function votar(Request $request, $id)
    {
        $request->validate([
            'opcion_id' => 'required|exists:opciones,id',
        ]);
    
        // Obtener la encuesta
        $encuesta = Encuesta::findOrFail($id);
    
        // Obtener la opción seleccionada
        $opcion = $encuesta->opciones()->findOrFail($request->opcion_id);
    
        // Incrementar los votos de la opción
        $opcion->increment('votos');
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('encuestas.show', $id)
                         ->with('success', 'Voto registrado correctamente');
    }
    

    public function destroy(string $id)
    {
        $encuesta = Encuesta::findOrFail($id);
        $encuesta->delete();
    
        return redirect()->route('encuestas.index')
                         ->with('success', 'Encuesta eliminada con éxito');
    }
}
