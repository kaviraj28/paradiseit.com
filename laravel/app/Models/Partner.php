<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'image', 'description', 'order', 'status'];

    public function clientcategory()
    {
        return $this->belongsToMany(Partner::class, 'client_categories', 'partner_id', 'clienttab_id');
    }
}
