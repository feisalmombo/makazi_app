<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AtmModel;
class Location extends Model
{
    public function atmmodels() {
        return $this->belongsToMany(AtmModel::class,'atms');
     }
}
