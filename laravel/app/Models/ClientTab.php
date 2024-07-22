<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientTab extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'order', 'status'];

    public function client()
    {
        return $this->belongsToMany(Partner::class, 'client_categories', 'clienttab_id', 'partner_id');
    }
}
