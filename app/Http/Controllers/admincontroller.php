<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\adminmodel;
use Illuminate\Support\Facades\Validator;
class admincontroller extends Controller
{
    // public function index()
    // {
    //     $admins = Admin::all();
    //     return view('admin.index', compact('admins'));
    // }

    // public function create()
    // {
    //     return view('admin.create');
    // }

    // public function store(Request $request)
    // {
    //     $admin = new Admin;
    //     $admin->name = $request->name;
    //     $admin->email = $request->email;
    //     $admin->password = bcrypt($request->password);
    //     $admin->save();

    //     return redirect()->route('admin.index')->with('success', 'Admin created successfully');
    // }

    // public function edit($id)
    // {
    //     $admin = Admin::find($id);
    //     return view('admin.edit', compact('admin'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $admin = Admin::find($id);
    //     $admin->name = $request->name;
    //     $admin->email = $request->email;
    //     $admin->password = bcrypt($request->password);
    //     $admin->save();

    //     return redirect()->route('admin.index')->with('success', 'Admin updated successfully');
    // }

    // public function destroy($id)
    // {
    //     $admin = Admin::find($id);
    //     $admin->delete();

    //     return redirect()->route('admin.index')->with('success', 'Admin deleted successfully');
    // }

    public function getadmin()
    {
        $dt_admin = adminmodel::get();
        return response()->json($dt_admin);
    }

    public function addadmin(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'admin_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }
        $save = adminmodel::create([
            'admin_name' => $req->get('admin_name'),
            'email' => $req->get('email'),
            'password' => $req->get('password'),
        ]);

        if ($save) {
            return Response()->json(['status' => true, 'message' => 'Sukses Menambah admin']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Menambah admin']);
        }
        // return view('coaches.create');
    }

    public function updateadmin(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'admin_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }
        $ubah = adminmodel::where('id_admin', $id)->update([
            'admin_name' => $req->get('admin_name'),
            'email' => $req->get('email'),
            'password' => $req->get('password'),
        ]);

        if ($ubah) {
            return Response()->json(['status' => true, 'message' => 'Sukses Mengubah admin']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Mengubah admin']);
        }
    }

    public function deleteadmin($id)
    {
        $hapus = adminmodel::where('id_admin', $id)->delete();
        if ($hapus) {
            return Response()->json(['status' => true, 'message' => 'Sukses Hapus Data admin']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Hapus Data admin']);
        }
    }
    public function getadminid($id)
    {
        $coach = adminmodel::where('id_admin', $id)->first();
        return Response()->json($coach);
    }

}

