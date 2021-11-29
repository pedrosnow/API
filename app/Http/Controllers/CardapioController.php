<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

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



   

}
