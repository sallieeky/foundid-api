<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function kategory()
    {
        return $this->belongsTo(Kategory::class, "kategory_id", "id");
    }

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class, "lokasi_id", "id");
    }

    public function postingan()
    {
        return $this->hasOne(Postingan::class, "item_id", "id");
    }
}
