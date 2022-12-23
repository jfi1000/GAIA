<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\operation_status;
use App\Http\Resources\OperationAllResource;
use DB;
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
    public function getOperationAllF($status)
    { 

        $operations= DB::table('operations as op')
                        ->join('residuo_tipos', 'residuo_tipos.id', '=', 'op.id_residuo')
                        ->join('operation_statuses', 'operation_statuses.operation_id', '=', 'op.id')
                        ->join('residuo_status', 'residuo_status.id', '=', 'operation_statuses.status_id')
                        ->join('users', 'users.id', '=', 'operation_statuses.user_id')

        ->select('op.weight','op.date_operation','op.id_client','op.id_residuo',
                'residuo_tipos.type as name_residuo',
                'operation_statuses.id as id_operation_status',
                'operation_statuses.status_id',
                'residuo_status.status as name_status',
                'users.name as name_user'
                )
        ->get();

        foreach ($operations as $operation) {
            if( $operation->status_id == $status){
                $result[] = $operation;
            }

        }
        
        return response()->json($result);

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
