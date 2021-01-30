<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {   
        if(optional(auth()->user())->id !== $user->id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $user->load([
            'clients' => function($clients){
                $clients->orderBy('name')
                ->withCount('vehicles');
            }
        ]);
    }

    public function create(CreateUserRequest $request)
    {
        return User::create($request->validated());
    }

    public function update(User $user, CreateUserRequest $request)
    {
        if(optional(auth()->user())->id !== $user->id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user->update($request->validated());
        $user->save();

        return response()->json('Dados atualizados com sucesso!');
         
    }

    public function delete(User $user)
    {
        if(optional(auth()->user())->id !== $user->id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user->delete();

        return response()->json('Usuario '.$user->name.' deletado com sucesso!');
    }

}
