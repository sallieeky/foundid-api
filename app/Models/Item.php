<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $appends = ["diffForHumans"];

    public function getDiffForHumansAttribute()
    {
        return $this->getAttribute("created_at")->diffForHumans();
    }

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
        return $this->hasOne(Lokasi::class, "id", "lokasi_id");
    }

    public function postingan()
    {
        return $this->hasOne(Postingan::class, "item_id", "id");
    }

    public function gambar()
    {
        return $this->hasMany(Gambar::class, 'item_id', 'id');
    }
}
