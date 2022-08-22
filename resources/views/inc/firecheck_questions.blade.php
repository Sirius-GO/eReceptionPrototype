<?php
use App\Question;

getQuestion($f->area_checked);

function getQuestion($quest){
    $quest = Question::where('ref', $quest)->take(1)->get();

    if(count($quest) > 0){
        foreach($quest as $q){
            echo $q->question;
        }
    }
    exit();
}