<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class subirController extends Controller
{
    public function guardar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'imagenes' => 'required|array|max:10',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Procesar las imágenes
        foreach ($request->file('imagenes') as $imagen) {
            $path = $imagen->store('imagenes', 'public'); // Almacena en el disco 'public'
            Imagen::create(['ruta' => $path]); // Guarda la ruta en la base de datos
        }

        return redirect()->route('mostrar.imagenes')->with('success', 'Imágenes subidas correctamente.');
    }

    public function mostrar()
    {
        $imagenes = Imagen::all(); // Recupera todas las imágenes
        $contador = $imagenes->count(); // Cuenta el número de imágenes
        return view('mostrar', compact('imagenes', 'contador'));
    }
    public function carrusel()
    {
        $imagenes = Imagen::all(); // Recupera todas las imágenes

        // Define un arreglo de frases
        $frases = [
            "Verte triunfar es tambien parte de mis sueños",
            "Te veo un ratito y todo lo malo se me olvida",
            "Quiero ser quien te bese cuando estes triste",
            "Te soy fiel desde que me gustas",
            "Contigo mi vida es mucho mas bonita",
            "Eres la persona que tanto deseaba encontrar",
            "Me encanta verte sonreir, por fa nunca dejes de hacerlo me alegra el corazon",
            "Si me enojo, solo me besas y ya",
            "Me siento veliz de haberte conocido",
            "Mi debilidad tiene nombre y apellido",
            "Tu mi amor Estefani Bojorjes Pacheco",
            "Ojitos encantador",
            "Una carita encantadora",
            "Una sonrisa que me encanta y me alegra",
            "mil cosas que hacer y siempre pienso en ti",
            "Ya que no puedo besarte voy a pensarte",
            "Ya que no puedo tocarte voy a soñarte",
            "Ya que no puedo ir a verte voy a esperarte",
            "Eres suficiente",
            "Vales la pena",
            "Eres increible",
            "Teves genial cuando sonries",
            "Y te mereces todo lo bonito en esta vida",
            "Te escogi a ti por que eres especial",
            "Te amo",
            "Te quiero",
            "Te adoro",
            "Te admiro",
            "Te agradezco",
            "Mi chiquita preciosa",
        ];

        return view('carrusel', compact('imagenes', 'frases'));
    }
    public function flores()
    {
        return view('flores');
    }
}
