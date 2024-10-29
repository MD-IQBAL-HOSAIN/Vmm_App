<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VMM extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
