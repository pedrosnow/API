<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends  Model {

    use HasFactory;

    protected $table = 'produto';

    public $timestamps = false;

    protected $fillable = [
        'id_produto',
        'produto',
        'preco',
        'complemento',
    ];

    public static function acai(){

        $query = DB::table('produto')
        ->select('*')
        ->get();

        return $query;

    }

    public static function verficiarProduto($id){

        $query = DB::table('produto as p')
        ->select('p.complemento')
        ->where('p.id_produto', '=', $id)
        ->get();

        return $query;
        
    }

    public static function complementos(){

        $query = DB::table('complemento as c')
        ->select('c.complemento')
        ->get();

        return $query;


    }


}