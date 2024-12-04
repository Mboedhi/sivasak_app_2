<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterQuestioner extends Model
{
    protected $table = 'master_questioners';
    protected $fillable = ['questioner'];

    public function answer()
    {
        return $this->hasMany(AnswerQuestioner::class, 'questioner_id', 'id');
    }
}
