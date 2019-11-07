<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Items extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'items';
    protected $primaryKey = 'iditems';

    protected $fillable = [
        'nameitems','unit','brand',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Categories','idcategories');
    }
}
