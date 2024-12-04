<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPatientRequest;
use App\Models\Users;
use App\Jobs\SendConfirmationEmail;


class UsersController extends Controller
{


    public function index()
    {
        $users = Users::all();
        return response()->json($users);
    }

    public function actionRegisterPatient(RegisterPatientRequest $request)
    {

        try {
            $validatedData = $request->validated();

            $user = Users::registerPatient($validatedData);

            if (!empty($user->name)) {
                SendConfirmationEmail::dispatch($user);
            }
            return response()->json($user, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Invalid data.',
                'messages' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Unexpected error.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
