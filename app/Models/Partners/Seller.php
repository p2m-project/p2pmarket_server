<?php

namespace App\Models\Partners;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
