<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $appends = ["diffForHumans"];

    public function getDiffForHumansAttribute()
    {
        return $this->getAttribute("created_at")->diffForHumans();
    }
}
