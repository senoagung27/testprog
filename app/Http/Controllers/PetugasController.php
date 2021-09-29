<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\IDuser;
use App\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $dataPetugas = Petugas::get();
        return view('Petugas.index', compact('dataPetugas'));
    }
    public function tambah()
    {
        $dataPetugas = Petugas::get();
        return view('Petugas.create', compact('dataPetugas'));
    }
    public function create(Request $request)
    {

        if ($request->password === null) {
            $password = Hash::make('123456');
        } else {
            $password = Hash::make($request->password);
        }
        // dd($request->all());
        // Penyewa::create($request->all());
        $idnyauser = IDuser::create([ ] );

        $user = new User;
        $user->role = 'petugas';
        $user->name = $request->nama_petugas;
        $user->id_user = $idnyauser->id_user;
        $user->email = $request->email;
        $user->password = $password;
        // $password->password = bcrypt('123456');
        $user->remember_token = str_random(60);
        $user->save();
        

        // $request->$request->add(['user_id'=>$user->id]);
        // $penyewa = Penyewa::create($request->all());
        // Penyewa::create($request->all());
        

        Petugas::create(
            [
                'nip' => $request->nip,
                'nama_petugas' => $request->nama_petugas,
                'id_user' => $idnyauser->id_user,
                'alamat_petugas' => $request->alamat_petugas,
                'jabatan' => $request->jabatan,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
            ]
        );
        return redirect('/Petugas')->with('tambah', ' Data Berhasil Di Input!!!!');
    }
    public function edit($id)
    {
        $dataPetugas = Petugas::where('id','=',$id)->first();
        $dataUser = User::where('id','=',$id)->first();
        return view('Petugas.edit',compact('dataPetugas','dataUser'));
    }
    public function simpanedit(Request $request) {

        
		Petugas::where('id',$request->id)->update([

			 'nip' => $request->nip,
			 'nama_petugas' => $request->nama_petugas,
             'jabatan' => $request->jabatan,
			 'alamat_petugas' => $request->alamat_petugas,
			 'email' => $request->email,
			 'no_tlp' => $request->no_tlp,
			//  'password' => $request->password,
            //  'password' => Hash::make($request->get('password'))
            
		]);
        // dd($request->all());
        // $request->user()->update([
        //     'password' => Hash::make($request->get('password'))
        // ]);
        User::where('id',$request->id)->update([

            'password' => Hash::make($request->get('password'))
            // 'password' => $request->password,
       ]);
        return redirect('/Petugas')->with('edit', ' Data Berhasil Di Edit!!!!');

    }
    public function hapus($id) {
        $dataPetugas = Petugas::where('id','=',$id)->first();
        // dd($dataBiodata);
        $dataPetugas->delete();
        return redirect('/Petugas');

    }
}
