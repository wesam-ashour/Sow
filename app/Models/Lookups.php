<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Lookups extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "core_lookups";


    public function governorate_fk_city()
    {
        return $this->hasOne(Lookups::class, 'fk_relationships', 'id');
    }



}
