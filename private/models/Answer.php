<?php

/**
 * Answer model
 */
class Answer extends Model
{

    //if we want  ot run a specific func before inserting
    protected $allowedCol = [
            'answer',
            'user_id',
            'question_id',
            'test_id',
            'answer_mark',
            'date',
    ];

    public function validate($DATA) 
    {

        $this->errors = array();

        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

    public function get_answers($test_id,$user_id)
    {
        $answers = new Answer();
    $query = "select question_id, answer,answer_mark from answers where user_id = :user_id && test_id = :test_id";
        $saved_answers = $answers->query($query,[
            'user_id' => $user_id,
            'test_id'=> $test_id
        ]);

        return $saved_answers;
    }
}