<?php

namespace App\Http\Controllers;

use App\Models\AnswerQuestioner;
use App\Models\MasterQuestioner;
use App\Models\Questioner;

class AdminQuesionerController extends Controller
{
    public function index()
    {
        $questioners = Questioner::with('vendor')->get();

        return view('admin_daftarquestioner', compact('questioners'));
    }

    public function show($id)
    {
        $questions = MasterQuestioner::all();
        $answers = AnswerQuestioner::where('questioner_id', $id)->get();

        $data = [];
        foreach ($questions as $question) {
            $questionss = MasterQuestioner::find($question->id);
            foreach ($answers as $ans) {
                if ($ans->questions_id == $question->id) {
                    $data[] = [
                        'id' => $questionss->id,
                        'question' => $questionss->questioner,
                        'answer' => $ans->answer,
                        'explanation' => $ans->explanation,
                    ];
                }
            }
        }
        return view('admin_hasilquestioner', compact('data'));
    }
}
