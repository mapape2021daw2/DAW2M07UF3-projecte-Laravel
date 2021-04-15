<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ong;
use Illuminate\Support\Facades\Hash;
use DB;

class Worker extends Controller
{
    public function crudOptions() {
        return view('workers.crudOptionsWorkers');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = DB::select('select * from treballador');
        return view('workers.listWorkers',['workers'=>$workers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $aso = DB::select('select * from associacio');
        return view('workers.addWorkers', ['aso' => $aso]);
    }

    public function addWorker(Request $request) {

        $nif = $request->get('nif');
        $name = $request->get('name');
        $address = $request->get('address');
        $city = $request->get('city');
        $area = $request->get('area');
        $phone = $request->get('phone');
        $mobile = $request->get('mobile');
        $email = $request->get('email');
        $aso = $request->get('asoSelection');
        $type = $request->get('workerType');

        $dbNif = DB::select('SELECT nif FROM treballador WHERE nif = ?', [$nif]);

        if($dbNif) {
            return view('workers.errorHandler.workerExists');
        }

        if($type == "professional") {

            $irpf = $request->get('irpf');
            $budget = $request->get('budget');
            $job = $request->get('job');

            if(empty($irpf) || empty($budget) || empty($job)) {
                return view('workers.errorHandler.emptyFields');
            }

            if(empty($irpf) || empty($budget) || empty($job)) {
                return view('workers.errorHandler.emptyFields');
            }

            DB::insert('INSERT INTO treballador(nif, nom, email, adreca, poblacio, comarca, telefon, mobil, associacio,data_alta) VALUES (?,?,?,?,?,?,?,?,?,current_timestamp)',
                [
                    $nif,
                    $name,
                    $email,
                    $address,
                    $city,
                    $area,
                    $phone,
                    $mobile,
                    $aso
                ]
            );
            DB::insert('INSERT INTO professional(nif, irpf, quota_ss, carrec) VALUES (?,?,?,?)',
                [
                    $nif,
                    $irpf,
                    $budget,
                    $job
                ]
            );
        } else {

            $age = $request->get('age');
            $profession = $request->get('profession');
            $hours = $request->get('hours');

            if(empty($age) || empty($profession) || empty($hours)) {
                return view('workers.errorHandler.emptyFields');
            }

            DB::insert('INSERT INTO treballador(nif, nom, email, adreca, poblacio, comarca, telefon, mobil, associacio,data_alta) VALUES (?,?,?,?,?,?,?,?,?,current_timestamp)',
                [
                    $nif,
                    $name,
                    $email,
                    $address,
                    $city,
                    $area,
                    $phone,
                    $mobile,
                    $aso
                ]
            );
            DB::insert('INSERT INTO voluntari(nif, edat, professio, hores) VALUES (?,?,?,?)',
                [
                    $nif,
                    $age,
                    $profession,
                    $hours
                ]
            );
        }
        return redirect('/listWorkers');
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
        $aso = DB::select('select * from associacio');
        return view('workers.modifyWorkers', ['aso'=>$aso]);
    }

    public function modifyWorker(Request $request) {

        $nif = $request->get('nif');
        $name = $request->get('name');
        $address = $request->get('address');
        $city = $request->get('city');
        $area = $request->get('area');
        $phone = $request->get('phone');
        $mobile = $request->get('mobile');
        $email = $request->get('email');
        $aso = $request->get('asoSelection');
        $type = $request->get('workerType');


        if($type == "professional") {

            $irpf = $request->get('irpf');
            $budget = $request->get('budget');
            $job = $request->get('job');

            if(empty($irpf) || empty($budget) || empty($job)) {
                return view('workers.errorHandler.emptyFields');
            }

            DB::update('UPDATE treballador SET nom = ?, email = ?, adreca = ?, poblacio = ?, comarca = ?, telefon = ?, mobil = ?, associacio = ? WHERE nif = ?',
                [
                    $name,
                    $email,
                    $address,
                    $city,
                    $area,
                    $phone,
                    $mobile,
                    $aso,
                    $nif
                ]
            );
            DB::update('UPDATE professional SET irpf = ?, quota_ss = ?, carrec = ? WHERE nif = ?',
                [
                    $irpf,
                    $budget,
                    $job,
                    $nif
                ]
            );
        } else {

            $age = $request->get('age');
            $profession = $request->get('profession');
            $hours = $request->get('hours');

            if(empty($age) || empty($profession) || empty($hours)) {
                return view('workers.errorHandler.emptyFields');
            }

            DB::update('UPDATE treballador SET nom = ?, email = ?, adreca = ?, poblacio = ?, comarca = ?, telefon = ?, mobil = ?, associacio = ? WHERE nif = ?',
                [
                    $name,
                    $email,
                    $address,
                    $city,
                    $area,
                    $phone,
                    $mobile,
                    $aso,
                    $nif
                ]
            );
            DB::update('UPDATE voluntari SET edat = ?, professio = ?, hores = ? WHERE nif = ?',
                [
                    $age,
                    $profession,
                    $hours,
                    $nif
                ]
            );
        }


        return redirect('/listWorkers');
    }

    public function renderDelete()
    {
        $workers = DB::select('select * from treballador');
        return view('workers.deleteWorkers', ['workers'=>$workers]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($nif)
    {
        DB::select('delete from professional where nif = ?', [$nif]);
        DB::select('delete from voluntari where nif = ?', [$nif]);
        DB::select('delete from treballador where nif = ?', [$nif]);
        return redirect('/deleteWorkers');
    }
}
