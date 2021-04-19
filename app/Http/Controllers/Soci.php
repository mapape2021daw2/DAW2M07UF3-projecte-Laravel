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
        $aso = DB::select('select * from associacio');
        return view('socis.afegirSocis', ['aso' => $aso]);
    }

    public function afegirSocis(Request $request) {
        try {
            $nif = $request->get('nif');
            $nom = $request->get('nom');
            $adreca = $request->get('adreca');
            $poblacio = $request->get('poblacio');
            $comarca = $request->get('comarca');
            $telefon = $request->get('telefon');
            $mobil = $request->get('mobil');
            $email = $request->get('email');
            $data_alta = $request->get('data_alta');
            $quota = $request->get('quota');
            $aport_volunt = $request->get('aport_volunt');
            $aport_anual = $request->get('aportacio');
            $associacio = $request->get('asoSelection');
            DB::insert('INSERT INTO soci(nif,nom,adreca,poblacio,comarca,telefon,mobil,email,data_alta,quota,aport_volunt,aportacio, associacio) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)', [$nif, $nom, $adreca, $poblacio, $comarca, $telefon, $mobil, $email, $data_alta, $quota, $aport_volunt, $aport_anual, $associacio]);
            return redirect('/mostraSocis');
        } catch (ModelNotFoundException $exception) {
            return back()->withError('No es pot afegir el usuari amb nif ' . $request->input('nif'));
        }
        return view('socis.mostraSocis');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    public function store(Request $request)
    {
        $this->validate($request, [
            'nif'       =>  'required',
            'nom'   =>  'required',
            'cognoms'   =>  'required',
            'adreca'   =>  'required',
            'poblacio'   =>  'required',
            'comarca'   =>  'required',
            'telefon'   =>  'required',
            'mobil'   =>  'required',
            'email'   =>  'required',
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
            'telefon'   =>  $request->get('telefon'),
            'mobil'   =>  $request->get('mobil'),
            'email'   =>  $request->get('email'),
            'quota'   =>  $request->get('quota'),
            'aportacio'   =>  $request->get('aportacio'),
        ]);
        $nouSoci->save();
        return redirect()->route('socis.create')->with('Exit','Dades afegides');
    }*/

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
        $aso = DB::select('select * from associacio');
        return view('socis.modificarSocis', ['aso'=>$aso]);
    }

    public function modifySocisData(Request $request)
    {
        $nif = $request->get('nif');
        $nom = $request->get('nom');
        $adreca = $request->get('adreca');
        $poblacio = $request->get('poblacio');
        $comarca = $request->get('comarca');
        $telefon = $request->get('telefon');
        $mobil = $request->get('mobil');
        $email = $request->get('email');
        $data_alta = $request->get('data_alta');
        $quota = $request->get('quota');
        $aport_volunt = $request->get('aport_volunt');
        $aport_anual = $request->get('aportacio');
        $associacio = $request->get('asoSelection');

        $formNif = DB::select('select nif from soci where nif = ?', [$nif]);
        $sociNif = (string)$formNif[0]->nif;

        if($sociNif === $nif) {
            DB::update('update soci set nom = ?, adreca = ?, poblacio = ?, comarca = ?, telefon = ?,
                        mobil = ?, email = ?, data_alta = ?, quota = ?, aport_volunt = ?, aportacio = ?, associacio = ?  where nif = ?',[$nom, $adreca, $poblacio, $comarca, $telefon, $mobil, $email, $data_alta, $quota, $aport_volunt, $aport_anual, $associacio, $nif]);
            return redirect('/mostraSocis');
        }
    }

    public function renderDelete()
    {
        $socis = DB::select('select * from soci');
        return view('socis.esborrarSocis', ['socis'=>$socis]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($nif)
    {
        DB::select('delete from soci where nif = ?', [$nif]);
        return redirect('/esborraSocis');
    }
}
