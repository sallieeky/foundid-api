<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function item()
    {
        return $this->hasOne(Item::class, "item_id", "id");
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, "postingan_id", "id");
    }
}
