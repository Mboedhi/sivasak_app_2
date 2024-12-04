<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerQuestioner extends Model
{
    protected $table = 'answer_questioners';

    protected $fillable = ['questions_id', 'answer', 'vendor_id'];

    public function questions()
    {
        return $this->belongsTo(MasterQuestioner::class, 'questions_id', 'id');
    }

    public function questioner()
    {
        return $this->belongsTo(Questioner::class, 'questioner_id', 'id');
    }
}
