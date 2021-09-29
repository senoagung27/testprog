<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Penyewa;
use App\IDuser;

class PenyewaController extends Controller
{
    public function index()
    {
        $data = Penyewa::get();
        return view('Penyewa.indexPenyewa', compact('data'));
    }
    public function tambah()
    {
        return view('Penyewa.create');
    }
    public function create(Request $request)
    {
        // dd($request->all());
        // Penyewa::create($request->all());
        $idnyauser = IDuser::create([ ] );

        $user = new User;
        $user->role = 'anggota';
        $user->name = $request->nama_penyewa;
        $user->id_user = $idnyauser->id_user;
        $user->email = $request->email;
        $user->password = bcrypt('123456');
        $user->remember_token = str_random(60);
        $user->save();
        

        // $request->$request->add(['user_id'=>$user->id]);
        // $penyewa = Penyewa::create($request->all());
        // Penyewa::create($request->all());
        

        Penyewa::create(
            [
                'nik' => $request->nik,
                'nama_penyewa' => $request->nama_penyewa,
                'id_user' => $idnyauser->id_user,
                'jabatan' => $request->jabatan,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
            ]
        );
        return redirect('/Penyewa')->with('tambah', ' Data Berhasil Di Input!!!!');
    }
    public function edit($id)
    {
        $dataPenyewa = Penyewa::where('id','=',$id)->first();
        return view('Penyewa.edit',compact('dataPenyewa'));
    }
    public function simpanedit(Request $request) {

        
		Penyewa::where('id',$request->id)->update([

			 'nik' => $request->nik,
			 'nama_penyewa' => $request->nama_penyewa,
             'jabatan' => $request->jabatan,
			 'alamat' => $request->alamat,
			 'email' => $request->email,
			 'no_tlp' => $request->no_tlp,
		]);
        return redirect('/Penyewa')->with('edit', ' Data Berhasil Di Edit!!!!');

    }
    public function hapus($id) {
        $dataPenyewa = Penyewa::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataPenyewa->delete();
        return redirect('/Penyewa');

    }
}