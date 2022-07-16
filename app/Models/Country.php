<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Uuid;

    protected $guarded = ['id'];

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
