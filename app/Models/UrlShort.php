<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShort extends Model
{
    use HasFactory;
    protected $table = 'shortened_url';
    protected $fillable =['org_link','short_link'];
}
