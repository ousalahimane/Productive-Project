<?php

namespace App\Models;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tach extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'taches';

    protected $dates = [
        'date_echeance',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'projet_id',
        'nom',
        'date_echeance',
        'etat',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateEcheanceAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateEcheanceAttribute($value)
    {
        $this->attributes['date_echeance'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function etiquettes()
    {
        return $this->belongsToMany(Etiquette::class);
    }

    public function TacheCommentaires()
    {
        return $this->hasMany(Commentaire::class, 'tache_id', 'id');
    }
}
