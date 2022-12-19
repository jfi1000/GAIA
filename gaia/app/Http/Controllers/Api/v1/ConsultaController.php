<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\operation_status;
use App\Http\Resources\OperationAllResource;

class ConsultaController extends Controller
{
    public function getOperationAll()
    {
        $operations = Operation::with('client:id,name,created_at,firstname,lastname','residuo_tipo:id,type,description')->get();
        // return response()->json($operations);
        return OperationAllResource::collection($operations);



    }

    public function getOperationAllP()
    { 

        $operations = Operation::with('client:id,name,created_at,firstname,lastname','residuo_tipo:id,type,description','operation_status.status','operation_status.users')->get();
        return response()->json($operations);

    }

    public function getOperationSearch($id, $type, $start_date, $end_date)
    {
        switch ($type) {
            case 1:
              //Búsqueda por cliente
              //Retorna todas las operaciones por cliente 
            $operations = Operation::with('client:id,name,created_at,firstname,lastname','residuo_tipo:id,type,description','operation_status.status','operation_status.users')
                                    ->where('id_client',$id)
                                    ->get();

            return response()->json($operations);
            break;
            case 2:
              //Búsqueda por id_operation
                $operations = Operation::with('client:id,name,created_at,firstname,lastname','residuo_tipo:id,type,description','operation_status.status','operation_status.users')
                ->where('id',$id)
                ->get();

                return response()->json($operations);

            break;
            case 3:
                //Búsqueda por residuo
                $operations = Operation::with('client:id,name,created_at,firstname,lastname','residuo_tipo:id,type,description','operation_status.status','operation_status.users')
                ->where('id_residuo',$id)
                ->get();

                return response()->json($operations);

            break; 
            case 4:
                //Búsqueda por fecha
                $operations = Operation::with('client:id,name,created_at,firstname,lastname','residuo_tipo:id,type,description','operation_status.status','operation_status.users')
                ->whereDate('created_at','<=', $start_date)
                ->whereDate('created_at','>=', $end_date)
                //->whereBetween('created_at', [$start_date,$end_date])
                ->get();

                return response()->json($operations);
            break;
            default:
            $msj ="Elige una opción correcta";
            return response()->json($msj,200);
        }
    }

}
