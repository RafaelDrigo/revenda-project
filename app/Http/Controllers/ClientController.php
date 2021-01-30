<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use App\Models\User;

class ClientController extends Controller
{
    public function show(Client $client)
    {
        if(optional(auth()->user())->id !== $client->user_id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $client->load('vehicles');
    }

    public function create(User $user, CreateClientRequest $request)
    {
        if(optional(auth()->user())->id !== $user->id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $user->clients()->create($request->validated());
    }

    public function update(Client $client, CreateClientRequest $request)
    {
        if(optional(auth()->user())->id !== $client->user_id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $client->update($request->validated());
        $client->save();

        return response()->json('Dados atualizados com sucesso!');
         
    }

    public function delete(Client $client)
    {
        if(optional(auth()->user())->id !== $client->user_id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $client->delete();

        return response()->json('Cliente '.$client->name.' deletado com sucesso!');
    }
}