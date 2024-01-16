<?php

namespace App\Http\Controllers;
use App\Models\coachmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class coachcontroller extends Controller
{
    public function getcoach()
    {
        $dt_coach = coachmodel::get();
        return response()->json($dt_coach);
    }

    public function addcoach(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'coach_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }
        $save = coachmodel::create([
            'coach_name' => $req->get('coach_name'),
            'email' => $req->get('email'),
            'password' => $req->get('password'),
        ]);

        if ($save) {
            return Response()->json(['status' => true, 'message' => 'Sukses Menambah coach']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Menambah coach']);
        }
        // return view('coaches.create');
    }

    public function updatecoach(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'coach_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error validatornya']->$validator->errors()->toJson());
        }
        $ubah = coachmodel::where('id_coach', $id)->update([
            'coach_name' => $req->get('coach_name'),
            'email' => $req->get('email'),
            'password' => $req->get('password'),
        ]);

        if ($ubah) {
            return Response()->json(['status' => true, 'message' => 'Sukses Mengubah coach']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Mengubah coach']);
        }
        // $coach = coachmodel::find($id);
        // return view('coaches.edit', compact('coach'));
    }

    // public function update(Request $request, $id)
    // {
    //     $coach = coachmodel::find($id);
    //     $coach->name = $request->name;
    //     $coach->email = $request->email;
    //     // Update other properties
    //     $coach->save();

    //     return redirect()->route('coaches.index')->with('success', 'Coach updated successfully.');
    // }

    public function deletecoach($id)
    {
        $hapus = coachmodel::where('id_coach', $id)->delete();
        if ($hapus) {
            return Response()->json(['status' => true, 'message' => 'Sukses Hapus Data Coach']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Hapus Data Coach']);
        }
        // $coach = coachmodel::find($id);
        // $coach->delete();

        // return redirect()->route('coaches.index')->with('success', 'Coach deleted successfully.');
    }
    public function getcoachid($id)
    {
        $coach = coachmodel::where('id_coach', $id)->first();
        return Response()->json($coach);
    }

}
    