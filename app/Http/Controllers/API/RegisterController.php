<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Company;

class RegisterController extends Controller
{
    public function store(RegisterUserRequest $request)
    {
        DB::beginTransaction();

        try {
            $path = $request->hasFile('brochure')
                ? $request->file('brochure')->store('brochures', 'public')
                : null;


            $user = User::create([
                'first_name'         => $request->first_name,
                'last_name'          => $request->last_name,
                'email'              => $request->email,
                'username'           => $request->username,
                'password'           => Hash::make($request->password),
                'participation_type' => $request->participation_type,
            ]);


            $user->company()->create([
                'company_name' => $request->company_name,
                'address' => $request->address,
                'city' => $request->city,
                'region' => $request->region,
                'country' => $request->country,
                'year_established' => $request->year_established,
                'website' => $request->website,
                'brochure_path' => $path,
            ]);

            DB::commit();
            return response()->json(['message' => 'Registration successful'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed', 'details' => $e->getMessage()], 500);
        }
    }
    public function countries()
    {
        return response()->json([
            'Philippines',
            'Japan',
            'United States',
            'Germany',
            'Australia'
        ]);
    }
}
