<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reunion extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'reunions';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'titre',
        'date',
        'time',
        'lien',
        'proces_verbal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }
    public function getProcesVerbalAttribute($value)
    {
        return $value; // Vous pouvez ajouter une logique de formatage si nécessaire
    }

    public function setProcesVerbalAttribute($value)
    {
        $this->attributes['proces_verbal'] = $value; // Vous pouvez ajouter une logique de manipulation si nécessaire
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
