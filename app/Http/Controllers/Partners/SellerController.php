<?php

namespace App\Http\Controllers\Partners;

use App\Http\Controllers\Controller;
use App\Models\Partners\Seller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::all();
        return response()->json($sellers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "user_id" => "required|integer|exists:users,id|unique:sellers,user_id",
        ];
        $fields = $request->validate($rules);
        $seller = Seller::create([
            "user_id" => $fields["user_id"],
        ]);

        return response()->json($seller, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partners\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        return response()->json($seller);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partners\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        $rules = [
            "user_id" => [
                "integer",
                "exists:users,id",
                Rule::unique("sellers", "user_id")->ignore($seller->id)
            ],
        ];

        $request->validate($rules);

        $seller->fill($request->only(["user_id"]));

        if ($seller->isClean()) {
            return response()->json([
                "message" => "values unchanged",
            ], 422);
        }

        $seller->save();

        return response()->json($seller);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partners\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();
        return response()->json($seller);
    }
}
