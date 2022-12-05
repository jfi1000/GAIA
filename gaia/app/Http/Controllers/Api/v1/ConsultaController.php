<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation;
use App\Models\operation_status;
use App\Http\Resources\OperationResource;

class ConsultaController extends Controller
{
    public function getOperationAll()
    {
    

        return OperationResource::collection(Operation::all());
        // $items = Operation::select('id', 'weight', 'date_operation')
        //             ->where('cve_ent',$cveEdo)
        //             ->where('cve_mun',$cveMun)
        //             ->get();
        // return response()->json($items);
    }

    public function getOperationAllP()
    { 
        return OperationResource::collection(Operation::paginate());
    }

}
