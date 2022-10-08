<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    protected $dates = ['created_at', 'updated_at'];
    // protected function serializeDate(DateTimeInterface $dates)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $dates)->diffForHumans();
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $dates)->translatedFormat('l, Y-m-d');
    // }

    protected $appends = ["diffForHumans"];

    public function getDiffForHumansAttribute()
    {
        return $this->getAttribute("created_at")->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function item()
    {
        return $this->hasOne(Item::class, "id", "item_id");
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, "postingan_id", "id");
    }
}
