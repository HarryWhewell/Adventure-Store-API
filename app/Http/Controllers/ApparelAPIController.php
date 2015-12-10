<?php

namespace App\Http\Controllers;

use App\Apparel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApparelAPIController extends Controller
{
    public function createApparel(Request $request){
        $apparel = new Apparel;
        $apparel->ref = $request->ref;
        $apparel->type = $request->type;
        $apparel->name = $request->name;
        $apparel->desc = $request->desc;
        $apparel->armour = $request->armour;
        $apparel->price = $request->price;
        $apparel->quantity = $request->quantity;

        if($apparel->save()){
            return response()->json(['response' => 'Saved Apparel', 'ref' => $apparel->ref]);
        } else{
            return response()->json(['response' => 'Could Not Save Apparel']);
        }
    }

    public function getAllApparel(){
        $apparel = Apparel::all();

        return response()->json(['Apparel' => $apparel]);
    }

    public function getApparel(Request $request){
        $id = $request->id;
        $apparel = Apparel::find($id);

        return response()->json(['Apparel' => $apparel]);
    }

    public function getApparelByRef(Request $request){
        $ref = $request->ref;
        $apparel = DB::table('apparel')->where('ref', '=', $ref)->get();

        return response()->json(['Apparel' => $apparel]);
    }

    public function updateApparel(Request $request){
        $id = $request->id;
        $apparel = Apparel::find($id);

        $apparel->ref = $request->ref;
        $apparel->type = $request->type;
        $apparel->name = $request->name;
        $apparel->desc = $request->desc;
        $apparel->armour = $request->armour;
        $apparel->price = $request->price;
        $apparel->quantity = $request->quantity;

        if($apparel->save()){
            return response()->json(['response' => 'Updated Apparel', 'ref' => $apparel->ref]);
        } else{
            return response()->json(['response' => 'Could Not Update Apparel']);
        }
    }

    public function deleteApparel(Request $request){
        $id = $request->id;
        $apparel = Apparel::find($id);

        if ( $apparel->delete() ) {
            return response()->json(['response' => 'Deleted Apparel', 'ref' => $apparel->ref]);
        }   else {
            return response()->json(['response' => 'Could Not Delete Apparel']);
        }
    }


}
