<?php

namespace App\Http\Controllers;
use App\Legajos;

use Illuminate\Http\Request;

class LegajosController extends Controller
{
    function getOne($LegAdministrador,$IDCodigo) {
 
        return   response()->json(["status"=>200,"data"=>Legajos::where('LegAdministrador',$LegAdministrador)->where('IDCodigo',$IDCodigo)->get()]);
    
    }

    function getOneById($id) {
 
        return   response()->json(["status"=>200,"data"=>Legajos::whereRaw('LegAdministrador+IDCodigo='.$id)->get()]);
    
    }

    function list() {

    
        return   response()->json(["status"=>200,"data"=>Legajos::All()]);
    
    }

    function newRecord(Request $request){

        $data = $request->json()->all();
        try{       
        Legajos::unguard();

        $legajo = Legajos::create($data);


        }catch(\Exception  $e){
            return response()->json(["status"=>500,"data"=>$e]);
        }

        return response()->json(["status"=>201,"data"=>$legajo]);

    }

    function updateRecord(Request $request){

        $data = $request->json()->all();

        $legajo = Legajos::where('LegAdministrador', $data['LegAdministrador'])->where('IDCodigo',$data['IDCodigo'])->get()->first();
        
        $legajo->LegLegajo = $data['LegLegajo'];
        $legajo->LegCuil = $data['LegCuil'];
        $legajo->LegFechaNacimiento = $data['LegFechaNacimiento'];
        $legajo->LegEMail = $data['LegEMail'];
        $legajo->LegEstado = $data['LegEstado'];
        $legajo->LegIntentos = $data['LegIntentos'];
        $legajo->LegToken = $data['LegToken'];

        try{       
            $legajo->save();

        }catch(\Exception  $e){
            return response()->json(["status"=>500,"data"=>$e]);
        }

        return response()->json(["status"=>201,"data"=>$legajo]);

    }

    function newRecord1(Request $request){

        $data = $request->json()->all();

        $legajo = new Legajos;


        $legajo->LegAdministrador = $data['LegAdministrador'];
        $legajo->IDCodigo = $data['IDCodigo'];
        $legajo->LegLegajo = $data['LegLegajo'];
        $legajo->LegCuil = $data['LegCuil'];
        $legajo->LegFechaNacimiento = $data['LegFechaNacimiento'];
        $legajo->LegEMail = $data['LegEMail'];
        $legajo->LegEstado = $data['LegEstado'];
        $legajo->LegIntentos = $data['LegIntentos'];
        $legajo->LegToken = $data['LegToken'];
        try{
            $legajo->save();
        }catch(\Exception  $e){
            return response()->json(["status"=>500,"data"=>$e]);
        }

        return response()->json(["status"=>201,"data"=>$legajo]);

    }
}
