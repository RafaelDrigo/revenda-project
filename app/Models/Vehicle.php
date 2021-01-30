<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['board', 'brand', 'model', 'color', 'year'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
