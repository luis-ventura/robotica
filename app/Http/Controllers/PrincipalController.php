<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
class PrincipalController extends Controller
{
    public function index()
    {
        $noticias = Noticia::orderBy('id','desc')->simplepaginate(8);
        return view('welcome',['noticias' => $noticias]);
    }

    public function post($id)
    {
        $noticia = Noticia::find($id);
        return view('post',['noticia' => $noticia]);
    }
}
