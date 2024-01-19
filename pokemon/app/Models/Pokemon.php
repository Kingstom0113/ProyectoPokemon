<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'subtype', 'region', 'user_id'];

    //igual aqui, relaciono las dos tablas
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
