<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Categoria, Empresa, Perfil, Permissao, Plano, Produto, Role, User, Mesa};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 public function home()
 {
     $empresa=auth()->user()->empresa;

     $totalUsuarios = User::where('empresa_id',$empresa->id)->count();
     $totalMesas = Mesa::count();
     $totalCategorias = Categoria::count();
     $totalProdutos = Produto::count();
     $totalEmpresas = Empresa::count();
     $totalPLanos = Plano::count();
     $totalCargos = Role::count();
     $totalPerfis = Perfil::count();
     $totalPermissoes = Permissao::count();

     return view("admin.paginas.home.home",compact('totalUsuarios'
         ,'totalMesas'
         ,'totalCategorias'
         ,'totalProdutos'
         ,'totalProdutos'
         ,'totalEmpresas'
         ,'totalPLanos'
         ,'totalCargos'
         ,'totalPerfis'
         ,'totalPermissoes'

 ));
 }
}
