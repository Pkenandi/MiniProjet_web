<?php

use App\Models\etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() //return all student in database
    {
       return etudiant::all();
    }

		public function LogIn(Request $request)
		{
			  $Loginfo =  DB::table('etudiants')->where('email', $request->get('email'))->first();

				if($Loginfo != null)
				{
					return response()->json([
							'success' => ' You are connected',
					], 200);
				}else
				{
						return response()->json([
							'error' => "Erreur d'authentification",
						]);
				}

		}

		public function enregistrement(Request $request) //enregistrement avec verification des données
		{
				$validator = Validator::make($request-> all(),[
					'nom'=> 'required|string',
					'prenom'=>'required|string',
					'email'=>'required|string',
					'password'=>'required|string',
			]);

			if($validator->fails()){
				return response()->json($validator->errors()-toJson(), 404);
			}else{

				$student = etudiant::create([
						'nom' => $request->get('nom'),
						'prenom' => $request->get('prenom'),
						'email' => $request->get('email'),
						'password'=> hashPassword::make($request->get('password')),
				]);

				return response()->json([ 
													'success' => 'Données enregistrées avec succés !'
																]);
			}

		}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) // suavegarde des données sans verification 
    {
        if(etudiant::create($request->all()))
				{
					return response()->json([
						'success' => " Compte créer avec succés !!"
					], 200);
				}else{
					return response()->json([
						'error' => ' échec de création du compte X'
					]);
				}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */

    public function show(etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, etudiant $etudiant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(etudiant $etudiant)
    {
        //
    }
}
