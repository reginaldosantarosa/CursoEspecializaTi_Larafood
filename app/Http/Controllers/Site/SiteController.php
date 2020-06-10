<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plano;
use Illuminate\Http\Request;

class SiteController extends Controller
{


    public function index()
    {
        $planos = Plano::with('detalhes')->orderBy('preco', 'ASC')->get();

        return view('site.paginas.home.index', compact('planos'));
    }


    /*
    public function plano($url)
    {
        if (!$plano = Plan:o:where('url', $url)->first()) {
            return redirect()->back();
        }

        session()->put('plano', $plano);

        return redirect()->route('register');
    }
    */

}
