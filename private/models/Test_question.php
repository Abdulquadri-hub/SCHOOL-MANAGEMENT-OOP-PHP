<?php

/**
 * Test_question model
 */
class Test_question extends Model
{

    protected $allowedCol = [
            'question',
            'test_id',
            'question_type',
            'correct_answer',
            'choices',
            'comment',
            'image',
            'date',
    ];

    protected $beforeInsert = [
        'make_question_id',
        'make_user_id',
    ];

    protected $afterSelect = [
        'get_user',
    ];

    public function validate($DATA) 
    {

        $this->errors = array();
    
        if (empty($DATA['question'])) {
            
            $this->errors['question'] = "provide a valid question";
        }

        // chck for multiple choice
        $num = 0;
        $letters = ['A','B','C','D','E'];
        foreach ($DATA as $key => $value) 
        {
            if (strstr($key, 'choice')) 
            {
                if (empty($value)) {
                    $this->errors['choice'.$num] = "provide a valid answer in choice {$letters[$num]}";
                }
                $num++;
            }
        }

        if(isset($_GET['type']) && $_GET['type'] == "objective")
        {
            if (empty($DATA['correct_answer']) || !preg_match("/^[a-z A-Z0-9]+$/", $DATA['correct_answer'])) {
            
                $this->errors['correct_answer'] = "Only letters and numbers allowed in the answer ";
            }
        }

        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }

    public function make_user_id($data)
    {
        if (isset($_SESSION['USER']->user_id)) 
        {
            $data['user_id'] = $_SESSION['USER']->user_id;
        }
        return $data;
    }
    public function make_question_id($data)
    {
        
            $data['question_id'] = random_string(60);
            return $data;
    }

    public function get_user($data)
    {
        $user = new User();
        foreach ($data as $key => $row) {
            if(!empty($row->user_id)){
            $result = $user->where('user_id',$row->user_id);
            $data[$key]->user = is_array($result) ? $result[0] : false;
            }
        }
            return $data;
    }

    
}