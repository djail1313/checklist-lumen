<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{

    use HasFactory;

    protected $table = 'templates';
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'created_by', 'updated_by'
    ];

    public function checklist()
    {
        return $this->hasOne(TemplateChecklist::class);
    }

    public function items()
    {
        return $this->hasMany(TemplateItem::class);
    }



}
