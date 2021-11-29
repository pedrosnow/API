<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function menuAcai()
    {  
        $menu_acai = Menu::acai();

        return response()->json($menu_acai);

    }

    public function VerificarProduto(Request $request){

      $verificar = Menu::verficiarProduto($request->input('id'));
    
      return response()->json($verificar);

    }

    public function Complementos(){

        $complementos =  Menu::complementos();

        return response()->json($complementos);

    }



   

}
