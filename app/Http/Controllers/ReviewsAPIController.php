<?php

namespace App\Http\Controllers;

use App\Reviews;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReviewsAPIController extends Controller
{
    public function createReview(Request $request){
        $review = new Reviews;
        $review->product_ref = $request->product_ref;
        $review->stars = $request->stars;
        $review->body = $request->body;
        $review->author = $request->author;

        if($review->save()){
            return response()->json(['response' => 'Saved Review', 'ref' => $review->ref]);
        } else{
            return response()->json(['response' => 'Could Not Save Review']);
        }
    }

    public function getAllReviews(){
        $reviews = Reviews::all();

        return response()->json(['Reviews' => $reviews]);
    }

    public function getReview(Request $request){
        $id = $request->id;
        $review = Reviews::find($id);

        return response()->json(['Review' => $review]);
    }

    public function getReviewByRef(Request $request){
        $product_ref = $request->product_ref;
        $review =  DB::table('reviews')->where('product_ref', '=', $product_ref)->get();

        return response()->json(['Reviews' => $review]);
    }

    public function updateReview(Request $request){
        $id = $request->id;
        $review = Reviews::find($id);

        $review->product_ref = $request->product_ref;
        $review->stars = $request->stars;
        $review->body = $request->body;
        $review->author = $request->author;

        if($review->save()){
            return response()->json(['response' => 'Updated Review', 'ref' => $review->ref]);
        } else{
            return response()->json(['response' => 'Could Not Update Review']);
        }

    }
    public function deleteReview(Request $request){
        $id = $request->id;
        $review = Reviews::find($id);

        if ( $review->delete() ) {
            return response()->json(['response' => 'Deleted Review', 'product_ref' => $review->product_ref]);
        }   else {
            return response()->json(['response' => 'Could Not Delete Review']);
        }
    }
}
