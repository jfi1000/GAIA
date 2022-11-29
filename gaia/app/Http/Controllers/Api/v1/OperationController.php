<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Operation;
use App\Models\operation_status;
use App\Http\Requests\OperationRequest;
use App\Http\Requests\OperationUpdateRequest;
use App\Http\Resources\OperationResource;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\QrMailable;
use Mail;
class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(Operation::all());
        return OperationResource::collection(Operation::all());

        // $operation = Operation::with('client')->get();
        // return response()->json($operation);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperationRequest $request)
    {
        //Insertamos el registro
        $operation = new OperationResource(Operation::create($request->all()));
        
        //obtenemos el id del registro insertado
        $insertedId = $operation->id;
        
        //Guardamos el status
        // $status = new OperationResource(operation_status::create($request->all()));
        $status = new operation_status;
        $status->status_id = 1;
        $status->operation_id = $insertedId;   
        // $status->user_id = auth()->id();   
        $status->user_id = 1;   
        $status->save();
    
        // status_id // asiganar status por defecto
        // operation_id //insertedId
        // user_id // user auth
        // $status = operation_status::create($request->all());
        // return response()->json($status,201);
        // $user = User::findOrFail($id);
        // $user = "jf.izaguirre@gmail.com";

        // Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
        //     $m->from('hello@app.com', 'Your Application');
        //     $m->to($user->email, $user->name)->subject('Your Reminder!');
        // });
        // Mail::to('your_email@gmail.com')->send(new QrMailable($mailData));
        
        $name = 'educba';
        Mail:: to ('jf.izaguirre@gmail.com') -> send (new QrMailable ($name));
        

        //retornamos el QR
        return QrCode::size(300)->generate('A basic example of QR code!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        // return response()->json($operation);
        return new OperationResource($operation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operation $operation)
    {
        $operation->update($request->all());//actualizamos
        return new OperationResource($operation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        $operation->delete();
        return response()->json(null, 204);
    }
}
