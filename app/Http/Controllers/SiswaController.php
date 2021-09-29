<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\IDuser;
use App\User;

class SiswaController extends Controller
{
   public function index()
    {
        $data = Siswa::get();
        $jumlah = Siswa::count();
        return view('Siswa.indexSiswa', compact('data','jumlah'));
    }
    public function tambah()
    {
        return view('Siswa.create');
    }
    public function create(Request $request)
    {
        // dd($request->all());
        // Penyewa::create($request->all());
        // $idnyauser = IDuser::create([ ] );

        // $user = new User;
        // $user->role = 'siswa';
        // $user->nama = $request->nama;
        // $user->id_user = $idnyauser->id_user;
        // $user->email = $request->email;
        // $user->password = bcrypt('123456');
        // $user->remember_token = str_random(60);
        // $user->save();
        

        // $request->$request->add(['user_id'=>$user->id]);
        // $penyewa = Penyewa::create($request->all());
        // Penyewa::create($request->all());
        

        Siswa::create(
            [
                'nis' => $request->nis,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]
        );
        return redirect('/Siswa')->with('tambah', ' Data Berhasil Di Input!!!!');
    }
    public function edit($id)
    {
        $dataSiswa = Siswa::where('id','=',$id)->first();
        return view('Siswa.edit',compact('dataSiswa'));
    }
    public function simpanedit(Request $request) {

        
		Siswa::where('id',$request->id)->update([

			 'nis' => $request->nis,
			 'nama' => $request->nama,
			 'alamat' => $request->alamat,
		]);
        return redirect('/Siswa')->with('edit', ' Data Berhasil Di Edit!!!!');

    }
    public function hapus($id) {
        $dataSiswa = Siswa::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataPenyewa->delete();
        return redirect('/Siswa');

    }
}