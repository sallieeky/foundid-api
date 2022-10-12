<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $appends = ["diffForHumans"];
    protected $dates = ['created_at', 'updated_at'];
    protected function serializeDate(DateTimeInterface $dates)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $dates)->translatedFormat('l, d-m-Y');
    }
    public function getDiffForHumansAttribute()
    {
        return $this->getAttribute("created_at")->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function postingan()
    {
        return $this->belongsTo(Postingan::class, "postingan_id", "id");
    }
}
