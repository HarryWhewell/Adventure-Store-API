<?php

namespace App\Http\Controllers;

use App\Weapons;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WeaponsAPIController extends Controller
{
    public function createWeapon(Request $request){
        $weapon = new Weapons;
        $weapon->ref = $request->ref;
        $weapon->type = $request->type;
        $weapon->name = $request->name;
        $weapon->desc = $request->desc;
        $weapon->damage = $request->damage;
        $weapon->price = $request->price;
        $weapon->quantity = $request->quantity;

        if($weapon->save()){
            return response()->json(['response' => 'Saved Weapon', 'ref' => $weapon->ref]);
        } else{
            return response()->json(['response' => 'Could Not Save Weapon']);
        }
    }

    public function getAllWeapons(){
        $weapon = Weapons::all();

        return response()->json(['Weapons' => $weapon]);
    }

    public function getWeapon(Request $request){
        $id = $request->id;
        $weapon = Weapons::find($id);

        return response()->json(['Weapon' => $weapon]);
    }

    public function getWeaponByRef(Request $request){
        $ref = $request->ref;
        $weapon = DB::table('weapons')->where('ref', '=', $ref)->get();

        return response()->json(['Weapon' => $weapon]);
    }

    public function updateWeapon(Request $request){
        $id = $request->id;
        $weapon = Weapons::find($id);

        $weapon->ref = $request->ref;
        $weapon->type = $request->type;
        $weapon->name = $request->name;
        $weapon->desc = $request->desc;
        $weapon->damage = $request->damage;
        $weapon->price = $request->price;
        $weapon->quantity = $request->quantity;

        if($weapon->save()){
            return response()->json(['response' => 'Updated Weapon', 'ref' => $weapon->ref]);
        } else{
            return response()->json(['response' => 'Could Not Update Weapon']);
        }
    }
    public function deleteWeapon(Request $request){
        $id = $request->id;
        $weapon = Weapons::find($id);

        if ( $weapon->delete() ) {
            return response()->json(['response' => 'Deleted Weapon', 'ref' => $weapon->ref]);
        }   else {
            return response()->json(['response' => 'Could Not Delete Weapon']);
        }
    }
}
