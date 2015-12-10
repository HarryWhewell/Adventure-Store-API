<?php

namespace App\Http\Controllers;

use App\Spells;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SpellsAPIController extends Controller
{
    public function createSpell(Request $request){
        $spell = new Spells;

        $spell->ref = $request->ref;
        $spell->name = $request->name;
        $spell->desc = $request->desc;
        $spell->effect = $request->armour;
        $spell->price = $request->price;
        $spell->quantity = $request->quantity;

        if($spell->save()){
            return response()->json(['response' => 'Saved Spell', 'ref' => $spell->ref]);
        } else{
            return response()->json(['response' => 'Could Not Save Spell']);
        }
    }

    public function getAllSpells(){
        $spell = Spells::all();

        return response()->json(['Spells' => $spell]);
    }

    public function getSpell(Request $request){
        $id = $request->id;
        $spell = Spells::find($id);

        return response()->json(['Spell' => $spell]);
    }

    public function getSpellByRef(Request $request){
        $ref = $request->ref;
        $spell = DB::table('spells')->where('ref', '=', $ref)->get();

        return response()->json(['Spell' => $spell]);
    }

    public function updateSpell(Request $request){
        $id = $request->id;
        $spell = Spells::find($id);

        $spell->ref = $request->ref;
        $spell->name = $request->name;
        $spell->desc = $request->desc;
        $spell->effect = $request->armour;
        $spell->price = $request->price;
        $spell->quantity = $request->quantity;

        if($spell->save()){
            return response()->json(['response' => 'Updated Spell', 'ref' => $spell->ref]);
        } else{
            return response()->json(['response' => 'Could Not Update Spell']);
        }
    }
    public function deleteSpell(Request $request){
        $id = $request->id;
        $spell = Spells::find($id);

        if ( $spell->delete() ) {
            return response()->json(['response' => 'Deleted Spell', 'ref' => $spell->ref]);
        }   else {
            return response()->json(['response' => 'Could Not Delete Spell']);
        }
    }
}
