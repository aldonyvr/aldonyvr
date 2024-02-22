<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function deleteUser($id){
        $user = User::find($id);
        if($user){
            $user->delete();
            return response()->json([
                'message' => "Data successfully deleted",
                'code' => 200
            ]);
        }else{
            return response([
                'message' => "Failed delete data $id / data doesn't exists"
            ]);
        }
    }

    public function show(){
        $input = User::all();

        return response()->json([
            'user'    => $input,
            'message' => 'User',
            'code' => 200
        ]);
    }

    public function getUser($id){
        $use = User::find($id);
        return response()->json($use);
    }
    public function updateUser($id,  Request $request){
        $usr = User::where('id',$id)->first();
        $usr->name = $request->name;
        $usr->email = $request->email;
        $usr->save();
        //return response JSON user is created
        return response()->json([
            'success' => true,
            'user'    => $usr,
            'status' => 200,
            'message' => 'Successfully Edit Data' 
        ], 200);
    }

}