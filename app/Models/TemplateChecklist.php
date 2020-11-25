<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateChecklist extends Model
{

    use HasFactory;

    protected $table = 'template_checklists';
    protected $fillable = [
        'template_id', 'description', 'due_unit', 'due_interval'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'template_id', 'id'
    ];

}
