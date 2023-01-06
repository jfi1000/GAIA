<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\operation_status;
use App\Models\ResiduoStatus;
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

    public function getOperationAllO($status)
    { 
        $consulta_status = ResiduoStatus::where('id',$status)->select('id','status_type')->first();
        if($consulta_status->status_type != 'operativo' ){
            $result= "Estatus no valido";
        }
        else {

        $sql= "SELECT op.id,op.weight,op.date_operation,op.id_client,op.id_residuo,
        residuo_tipos.type as name_residuo,
        operation_statuses.id_nuevo as id_operation_status,
        operation_statuses.ultimo_status,
        residuo_status.status as name_status,
        users.name as name_user, 
        residuo_status.status_type from operations as op
                INNER JOIN residuo_tipos on residuo_tipos.id = op.id_residuo
                INNER JOIN (
                SELECT id,status_id,user_id, created_at, deleted_at, operation_id , MAX(id) AS id_nuevo, MAX(status_id) AS ultimo_status
                FROM operation_statuses
                GROUP BY operation_id 
                ) operation_statuses
                ON operation_statuses.operation_id = op.id  
                inner join residuo_status on residuo_status.id = operation_statuses.ultimo_status
                inner join users on users.id = operation_statuses.user_id 
                WHERE residuo_status.status_type LIKE '%operativo%'
                GROUP BY operation_statuses.operation_id 
                ";

        $operations = DB::select($sql);

        foreach ($operations as $operation) {
            if( $operation->ultimo_status == $status){
                $result[] = $operation;
            }

        }
        
        if(empty($result)){
            $result= "Sin resultados encontrados";
        }
    
        }
        
        return response()->json($result);

    }
    public function getOperationAllF($status)
    { 

        // $operations= DB::table('operations as op')
        //                 ->join('residuo_tipos', 'residuo_tipos.id', '=', 'op.id_residuo')
        //                 ->join('operation_statuses', 'operation_statuses.operation_id', '=', 'op.id')

        //                 // ->join('operation_statuses', function($join){
        //                 //     $join->on('cape.id_tipo', '=', 'ctip.id');

        //                 ->join('residuo_status', 'residuo_status.id', '=', 'operation_statuses.status_id')
        //                 ->join('users', 'users.id', '=', 'operation_statuses.user_id')
                        
        //                 // ->where('operation_statuses.status_id','=', 'SELECT MAX(operation_statuses.id) FROM operation_statuses')
        //                 // WHERE list_price = (SELECT MAX(list_price ) FROM production.products);

        //                 ->whereNull('op.deleted_at')
        //                 ->whereNull('operation_statuses.deleted_at')
                        
        // ->select('op.id','op.weight','op.date_operation','op.id_client','op.id_residuo',
        //         'residuo_tipos.type as name_residuo',
        //         'operation_statuses.id as id_operation_status',
        //         'operation_statuses.status_id',
        //         'residuo_status.status as name_status',
        //         'users.name as name_user'
        //         ) 
        // ->get();
        // $consulta_status = ResiduoStatus::all();
        $consulta_status = ResiduoStatus::where('id',$status)->select('id','status_type')->first();
        if($consulta_status->status_type != 'financiero' ){
            $result= "Estatus no valido";
        }
        else {

        $sql= "SELECT op.id,op.weight,op.date_operation,op.id_client,op.id_residuo,
        residuo_tipos.type as name_residuo,
        operation_statuses.id_nuevo as id_operation_status,
        operation_statuses.ultimo_status,
        residuo_status.status as name_status,
        users.name as name_user, 
        residuo_status.status_type from operations as op
                INNER JOIN residuo_tipos on residuo_tipos.id = op.id_residuo
                INNER JOIN (
                SELECT id,status_id,user_id, created_at, deleted_at, operation_id , MAX(id) AS id_nuevo, MAX(status_id) AS ultimo_status
                FROM operation_statuses
                GROUP BY operation_id 
                ) operation_statuses
                ON operation_statuses.operation_id = op.id  
                inner join residuo_status on residuo_status.id = operation_statuses.ultimo_status
                inner join users on users.id = operation_statuses.user_id 
                WHERE residuo_status.status_type LIKE '%financiero%'
                GROUP BY operation_statuses.operation_id 
                ";

        $operations = DB::select($sql);

        foreach ($operations as $operation) {
            if( $operation->ultimo_status == $status){
                $result[] = $operation;
            }

        }
        
        if(empty($result)){
            $result= "Sin resultados encontrados";
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
