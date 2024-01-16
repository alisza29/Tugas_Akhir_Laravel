<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\userrmodel; 

class userrcontrol extends Controller
{
    public function getuser()
    {
        $dt_pengguna = userrmodel::get(); 
        return response()->json($dt_pengguna);
    }

    public function adduser(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tgl_lahir' => 'required|date',
            'tujuan' => 'required|in:Olahraga saja,Turun BB,Naik BB',
        ]);
        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }
        $save = userrmodel::create([
            'username' => $req->get('username'),
            'email' => $req->get('email'),
            'password' => $req->get('password'),
            'tgl_lahir' => $req->get('tgl_lahir'),
            'tujuan' => $req->get('tujuan'),
        ]);

        if ($save) {
            return Response()->json(['status' => true, 'message' => 'Sukses Menambah user']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Menambah user']);
        }
        // return view('coaches.create');
    }

    public function updateuser(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tgl_lahir' => 'required|date',
            'tujuan' => 'required|in:Olahraga saja,Turun BB,Naik BB',

        ]);
        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }
        $ubah = userrmodel::where('id_user', $id)->update([
            'username' => $req->get('username'),
            'email' => $req->get('email'),
            'password' => $req->get('password'),
            'tgl_lahir' => $req->get('tgl_lahir'),
            'tujuan' => $req->get('tujuan'),

        ]);

        if ($ubah) {
            return Response()->json(['status' => true, 'message' => 'Sukses Mengubah user']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Mengubah user']);
        }
    }

    public function deleteuser($id)
    {
        $hapus = userrmodel::where('id_user', $id)->delete();
        if ($hapus) {
            return Response()->json(['status' => true, 'message' => 'Sukses Hapus Data user']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Hapus Data user']);
        }
    }
    public function getuserid($id)
    {
        $coach = userrmodel::where('id_user', $id)->first();
        return Response()->json($coach);
    }

}
