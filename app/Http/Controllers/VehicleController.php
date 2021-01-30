<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVehicleRequest;
use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function create(Client $client, CreateVehicleRequest $request)
    {
        if(optional(auth()->user())->id !== $client->user_id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $client->vehicles()->create($request->validated());
    }

    public function update(Vehicle $vehicle, Request $request)
    {
        if(optional(auth()->user())->id !== $vehicle->client->user_id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $vehicle->update($request->toArray());

        return response()->json('Dados atualizados com sucesso!');
         
    }

    public function delete(Vehicle $vehicle)
    {
        if(optional(auth()->user())->id !== $vehicle->client->user_id){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $vehicle->delete();

        return response()->json('Veiculo '.$vehicle->id.' deletado com sucesso!');
    }
}
