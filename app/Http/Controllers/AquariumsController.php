<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aquariums;
use Illuminate\Support\Facades\Auth;
use Validator;

class AquariumsController extends Controller
{
        /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['register']]);
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
            'glass_type' => 'required',
            'size_in_litres' => 'required',
            'shape' => 'required',
        ]);

        if ($aquarium=Aquariums::create([
            'user_id' => $user_id,
            'glass_type' => $request['glass_type'],
            'size_in_litres' => $request['size_in_litres'],
            'shape' => $request['shape'],
        ])) {
            return response()->json([
                'message' => 'Aquarium successfully added',
                'aquarium' => $aquarium
            ], 201);
        }
        return response()->json($errors, 400);

        
    }
}
