<?php

namespace App\Http\Controllers;
use App\Docente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TipoIdentificacion;
use App\GrupoInvestigacion;
use App\Departamento;
use App\Categoria;

class DocenteController extends Controller
{
    public function consultar(Docente $docente){
        $t=$docente->tipoidentificacion_id;
        $g=$docente->grupoInvestigacion_id;
        $d=$docente->Departamento;
        $c=$docente->categoria_id;

        $categoria=Categoria::find($c);
        $categorias=Categoria::all();

        $departamento= Departamento::find($d);
        $departamentos= Departamento::all();

        $grupo= GrupoInvestigacion::find($g);
        $grupos=GrupoInvestigacion::all();

        $tipo= TipoIdentificacion::find($t);
        $Tipos=TipoIdentificacion::all();

        return view ('admin.personal',compact('docente','tipo','Tipos','categoria','categorias','departamento','departamentos','grupo','grupos'));
    }
}
