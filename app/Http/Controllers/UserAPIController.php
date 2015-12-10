<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserAPIController extends Controller
{
    public function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $password = $request->password;
        $user->password = bcrypt($password);

        if($user->save()){
            return response()->json(['response' => 'Saved User', 'id' => $user->id]);
        } else{
            return response()->json(['response' => 'Could Not Save User']);
        }

    }

    public function getUser(Request $request){
        $id = $request->id;
        $user = User::find($id);

        return response()->json(['User' => $user]);
    }

    public function getAllUsers(){
        $users = User::all();

        return response()->json(['Users' => $users]);
    }

    public function changePassword(Request $request){
        $old_password = $request->password;
        $new_password = $request->new_password;
        $id = $request->id;

        $user = User::find($id);
        $current_password = $user->password;


        if(password_verify($old_password,$current_password)){
            $user->password = bcrypt($new_password);

            if($user->save()) {
                return response()->json(['response' => 'Changed Password']);
            }
        }
        else{
            return response()->json(['response' => 'Could Not Change password']);
        }
    }

    public function loginUser(Request $request){
        $user = array();
        $email = $request->email;
        $password = $request->password;

        $user_lists = DB::table('users')->where('email','=',$email)->get();

        foreach($user_lists as $user_list){
            $user['id'] = $user_list->id;
            $user['name'] = $user_list->name;
            $user['password'] = $user_list->password;
        }

        $current_password = $user['password'];

        if(password_verify($password,$current_password)){
            return response()->json(['response' => 'User Logged In', 'id' => $user['id'], 'name' => $user['name']]);
        }
        else{
            return response()->json(['response' => 'Could Not Login User']);
        }
    }
}
