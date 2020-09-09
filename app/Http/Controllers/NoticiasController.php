<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Noticia;

class NoticiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $noticias = Noticia::orderBy('id','desc')->get();
        return view('noticias.index',['noticias' => $noticias]);
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'required|max:255',
            'image_url' => 'required|image',
            'content'   => 'required'
        ]);

        $fileNameWithTheExtension = request('image_url')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image_url')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image_url')->storeAs('public/notice_images', $newFileName);

        $user = auth()->user();

        $noticias = new Noticia();
        $noticias->title     = request('title');
        $noticias->content   = request('content');
        $noticias->image_url = $newFileName;
        $noticias->user_id   = $user->id;
        $noticias->save();

        return redirect('noticias')->withSuccess('Noticia Creada Correctamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $noticias = Noticia::findOrFail($id);
        return view('noticias.edit',['noticias' => $noticias]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'     => 'required|max:255',
            'image_url' => 'required|image',
            'content'   => 'required'
        ]);

        $fileNameWithTheExtension = request('image_url')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        $extension = request('image_url')->getClientOriginalExtension();
        $newFileName = $fileName . '_' . time() . '.' . $extension;
        $path = request('image_url')->storeAs('public/notice_images', $newFileName);

        $noticias = Noticia::findOrFail($id);

        $noticias->title     = request('title');
        $noticias->content   = request('content');
        $noticias->image_url = $newFileName;

        $noticias->save();

        return redirect('noticias')->withToastInfo('Noticia Actualizada Correctamente');
    }

    public function destroy(Request $request)
    {
        $noticias = Noticia::findOrFail($request->noticia_id);
        $oldImage = public_path(). '/storage/notice_images/'. $noticias->image_url;

        if (file_exists($oldImage))
        {
            unlink($oldImage);
        }
        $noticias->delete();
        return redirect()->route('noticias.index')->withToastError('Eliminado correctamente');

    }
}
