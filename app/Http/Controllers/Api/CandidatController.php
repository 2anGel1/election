<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidats = Candidat::with('voters')->get();

        return response()->json([
            'status' => true,
            'data' => $candidats
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->filled(['name', 'surname']);

        if($validate){
            
            $candidat = new Candidat;
            $candidat->name = $request->name;
            $candidat->surname = $request->surname;
            $candidat->save();

            return response()->json([
                'status' => true,
                'data' => $candidat
            ]);

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
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidat = Candidat::find($id);

        if($candidat){

            $candidat->voters;
            return response()->json([
                'status' => true,
                'data' => $candidat
            ]);

        }else{
            return response()->json([
                'status' => false,
                'message' => 'id invalide ou inexistant'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidat $candidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidat = Candidat::find($id);

        if($candidat){

            if($request->name)
                $candidat->name = $request->name;
            if($request->surname) 
                $candidat->surname = $request->surname;

            $candidat->save();

            return response()->json([
                'status' => true,
                'data' => $candidat
            ]);            

        } else{
            return response()->json([
                'status' => false,
                'message' => 'id invalide ou inexistant'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidat  $candidat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidat = Candidat::find($id);

        if($candidat){

            $candidat->delete();
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
