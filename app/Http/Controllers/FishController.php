<?php

namespace App\Http\Controllers;

use App\Models\Aquariums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Fish;

class FishController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register']]);
    }




    /**
     * Show all fish.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_all()
    {
        if ($all_fish = Fish::all()) {

            return response()->json(
                $all_fish,
                200
            );
        }
        return response()->json('Error', 404);
    }

    /**
     * find single fish
     *
     * @return \Illuminate\Http\Response
     */
    public function find_fish($id)
    {

        if ($fish = Fish::find($id)) {
            return response()->json(
                $fish,
                200
            );
        }
        return response()->json('Error', 404);
    }



    /**
     * add aquarium
     * 
     * @return \Illuminate\Http\JsonResponse
     **/
    public function create(Request $request)
    {
        $user_id = Auth::id();
        $errors = request()->validate([
            'color' => 'required',
            'fins_no' => 'required',
        ]);
        $fins = $request['fins_no'];
        if ($fins < 3) {
            $aquariums = Aquariums::select(['id'])->where('user_id', '=', $user_id)->where('size_in_litres', '<=', 75)->get();
            foreach ($aquariums as $aquarium) { //gets aquarium id to store
                $aquarium_id = $aquarium->id;
            }
            if ($aquarium = Fish::create([ //inserts fish with less than 3 fins on aquarium less than 75 litres
                'user_id' => $user_id,
                'aquarium_id' => $aquarium_id,
                'color' => $request['color'],
                'fins_no' => $fins,
            ])) {
                return response()->json([
                    'message' => 'Fish successfully added',
                    'aquarium' => $aquarium
                ], 201);
            }
            return response()->json($errors, 400);
        }
        //runs if fins are more than 3
        $aquariums = Aquariums::select(['id'])->where('user_id', '=', $user_id)->where('size_in_litres', '>', 75)->get();
        foreach ($aquariums as $aquarium) {
            $aquarium_id = $aquarium->id;
        }
        if ($aquarium = Fish::create([ //inserts fish with more than 3 fins on aquarium more than 75 litres
            'user_id' => $user_id,
            'aquarium_id' => $aquarium_id,
            'color' => $request['color'],
            'fins_no' => $fins,
        ])) {
            return response()->json([
                'message' => 'Fish successfully added',
                'aquarium' => $aquarium
            ], 201);
        }
        return response()->json($errors, 400);
    }
}
