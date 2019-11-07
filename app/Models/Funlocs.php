<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Funlocs extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'funlocs';
    protected $primaryKey = 'idfunlocs';
    protected $fillable = [
        'number','cabang','description','created_by',
    ];
    protected $hidden = [
        'created_at','created_by',
        'updated_at','updated_by',
        'deleted_at','deleted_by'
    ];

    // di bawah ini untuk menjelaskan protected $hidden beserta isinya
    protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
        $model->created_by = Auth::user()->idusers;
        return true;
    });

    static::updating(function ($model) {
        $model->updated_by = Auth::user()->idusers;
        return true;
    });

    static::deleting(function ($model) {
        $model->deleted_by = Auth::user()->idusers;
        return true;
    });
  }

  public function levels()
  {
    return $this->belongsTo('App\Models\Levels','idlevels');
  }

}
