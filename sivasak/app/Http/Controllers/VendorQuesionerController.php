<?php

namespace App\Http\Controllers;

use App\Models\AnswerQuestioner;
use App\Models\MasterQuestioner;
use App\Models\Questioner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorQuesionerController extends Controller
{
    public function index()
    {
        return view('vendor_questioner');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $validateData = $request->validate([
            'answer_1' => 'required',
            'answer_2' => 'required',
            'answer_3' => 'required',
            'answer_4' => 'required',
            'answer_5' => 'required',
            'answer_6' => 'required',
            'answer_7' => 'required',
            'answer_8' => 'required',
            'explanation_8' => 'nullable',
            'answer_9' => 'required',
            'answer_10' => 'required',
            'answer_11' => 'required',
            'answer_12' => 'required',
            'answer_13' => 'required',
            'answer_14' => 'required',
            'explanation_14' => 'nullable',
        ]);

        $masterQuestioner = MasterQuestioner::all();

        $questioner = new Questioner();
        $questioner->vendor_id = Auth::user()->vendor->vendor_id;
        $questioner->date = now()->format('Y-m-d');
        $saveQuestioner = $questioner->save();
        if(!$saveQuestioner){
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengisi kuesioner');
        }

        $status = true;
        foreach ($masterQuestioner as $key => $value) {
            $answer = new AnswerQuestioner();
            $answer->questions_id = $value->id;
            $answer->questioner_id = $questioner->id;
            if($value->id == 8 || $value->id == 14){
                if($value->id == 8 && $validateData['answer_8'] == 'Ada'){
                    $answer->answer = $validateData['answer_8'];
                    $answer->explanation = $validateData['explanation_8'];
                }else{
                    $answer->answer = $validateData['answer_8'];
                }
                if($value->id == 14 && $validateData['answer_14'] == 'Ada'){
                    $answer->answer = $validateData['answer_14'];
                    $answer->explanation = $validateData['explanation_14'];
                }else{
                    $answer->answer = $validateData['answer_14'];
                }
            }else {
                $answer->answer = $validateData['answer_'.$value->id];
            }
            $save = $answer->save();
            if(!$save){
                DB::rollBack();
                dd($answer);
                $status = false;
            }
        }

        if(!$status){
            return redirect()->back()->with('error', 'Gagal mengisi kuesioner');
        }else {
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil mengisi kuesioner');
        }
    }
}