<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Code;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportCode;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = Code::with('voter')->get();

        return response()->json([
            'status' => true,
            'data' => $codes
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->filled(['value']);

        if($validate){
            
            $code = new Code;
            $code->value = $request->value;
            $code->validity = 0;
            $code->voter_id = null;
            $code->save();
            
            return response()->json([
                'status' => true,
                'data' => $code
            ]);

        } else{
            return response()->json([
                'status' => false,
                'message' => 'Remplissez tous les champs correctement'
            ]);
        }
    }

    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Code  $code
    //  * @return \Illuminate\Http\Response
     */
    public function exportCodes(Request $request)
    {
        return Excel::download(new ExportCode, 'codes.csv');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
    //  * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $code = Code::find($id);

        if($code){

            $code->delete();
            return response()->json([
                'status' => true,
                'message' => 'Done'
            ]); 

        } else{
            return response()->json([
                'status' => false,
                'message' => 'id invalide ou inexistant'
            ]);
        }
    }
}
