<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    const STATUS = ['1','2','3','4','5','6'];
}
