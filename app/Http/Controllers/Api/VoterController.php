<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use App\Models\Code;
use App\Models\Candidat;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voters = Voter::with('candidat', 'code')->get();

        return response()->json([
            'status' => true,
            'data' => $voters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->filled(['candidat_id', 'code']);

        if($validate){

            $candidat = Candidat::find($request->candidat_id);
            if($candidat){

                $code = Code::where('value', $request->code)->first();
                if($code){

                    if($code->validity == 0){
                        $voter = new Voter;
                        $voter->candidat_id = $request->candidat_id;
                        $voter->save();

                        $code->validity = 1;
                        $code->voter_id = $voter->id;
                        $code->save();

                        $voter->candidat;
                        $voter->code;
                        return response()->json([
                            'status' => true,
                            'data' => $voter
                        ]);

                    } else{
                        return response()->json([
                            'status' => false,
                            'message' => 'code déja utilisé'
                        ]);
                    }
                } else{
                    return response()->json([
                        'status' => false,
                        'message' => 'code invalide'
                    ]);
                }
            } else{
                return response()->json([
                    'status' => false,
                    'message' => 'id invalide ou inexistant'
                ]);
            }
        } else{
            return response()->json([
                'status' => false,
                'message' => 'Remplissez tous les champs correctement'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function show(Voter $voter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function edit(Voter $voter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voter $voter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voter  $voter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voter $voter)
    {
        //
    }
}
