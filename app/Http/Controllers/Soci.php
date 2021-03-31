<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socis;
use DB;

class Soci extends Controller
{
    public function crudOptions() {
        return view('socis.crudOptionsSocis');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socis = DB::select('select * from soci');
        return view('socis.mostraSocis',['socis'=>$socis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socis.afegirSocis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nif'       =>  'required',
            'nom'   =>  'required',
            'cognoms'   =>  'required',
            'adreca'   =>  'required',
            'poblacio'   =>  'required',
            'comarca'   =>  'required',
            'telf_fixe'   =>  'required',
            'telf_mobil'   =>  'required',
            'correu'   =>  'required',
            'quota'   =>  'required',
            'aportacio'   =>  'required',
        ]);
        $nouSoci = new Socis([
            'nif'       =>  $request->get('nif'),
            'nom'   =>  $request->get('nom'),
            'cognoms'   =>  $request->get('cognoms'),
            'adreca'       =>  $request->get('adreca'),
            'poblacio'       =>  $request->get('poblacio'),
            'comarca'   =>  $request->get('comarca'),
            'telf_fixe'   =>  $request->get('telf_fixe'),
            'telf_mobil'   =>  $request->get('telf_mobil'),
            'correu'   =>  $request->get('correu'),
            'quota'   =>  $request->get('quota'),
            'aportacio'   =>  $request->get('aportacio'),
        ]);
        $nouSoci->save();
        return redirect()->route('socis.create')->with('Exit','Dades afegides');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function renderModify() {
        return view('socis.modificarSocis');
    }

    public function modifySocisData()
    {
        $nif = $_POST["nif"];
        $nom = $_POST["nom"];
        $cognoms = $_POST["cognoms"];
        $adreca = $_POST["adreca"];
        $poblacio = $_POST["poblacio"];
        $comarca = $_POST["comarca"];
        $telf_fixe = $_POST["telf_fixe"];
        $telf_mobil = $_POST["telf_mobil"];
        $correu = $_POST["correu"];
        $quota = $_POST["quota"];
        $aportacio = $_POST["aportacio"];

        $formNif = DB::select('select nif from soci where nif = ?', [$nif]);
        $sociNif = (string)$formNif[0]->nif;

        if($sociNif === $nif) {
            DB::update('update associacio set nif = ?, nom = ?, cognoms = ?, adreca = ?, poblacio = ?, comarca = ?, telf_fixe = ?, 
                        telf_mobil = ?, correu = ?, quota = ?, aportacio = ?  where nif = ?', [$nif, $nom, $cognoms, $adreca, $poblacio, $comarca, $telf_fixe, $telf_mobil, $correu, $quota, $aportacio]);
            return redirect('/mostraSocis');
        }
    }

    public function renderDelete()
    {
        $users = DB::select('select * from soci');
        return view('socis.eliminarSocis', ['socis'=>$socis]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::select('delete from soci where id = ?', [$id]);
        return redirect('/eliminarSocis');
    }
}