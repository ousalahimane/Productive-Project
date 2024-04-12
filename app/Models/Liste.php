<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liste extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'listes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom',
        'position',
        'projet_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function listTaches()
    {
        return $this->hasMany(Tach::class, 'list_id', 'id');
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_id');
    }
}
