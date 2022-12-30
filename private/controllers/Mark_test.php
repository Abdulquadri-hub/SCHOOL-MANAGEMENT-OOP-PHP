<?php

/**
 * Mark_test controller
 */
class Mark_test extends Controller
{
    function index($id = "", $user_id = "") 
    {

        if (!Auth::access('lecturer')) 
        {
            $this->redirect('access_denied');
        }

        $errors = [];

        $question = new Test_question();
        $test = new Test();
        $row = $test->first('test_id',$id);#row for the data 

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['tests', 'tests'];

        if($row)
        {
            $crumbs[] = [$row->test,''];

            if($row->disabled == 0){
            $query = "update tests set edited = 0 where test_id = :test_id limit 1";
            $test->query($query,['test_id'=>$id]);
            }
        }

        $page_tab = 'view';
        $answers = new Answer();
        $answered_tests = new Answered_test();

        if (count($_POST) > 0) 
        {
            
            // store the answers 
            foreach ($_POST as $key => $value) 
            {
                
                if (is_string($key)) 
                {
                    $arr['user_id'] = $user_id;
                    $arr['question_id'] = $key;
                    $arr['test_id'] = $id;
                    $arr['answer_mark'] = trim($value);
    
                    $query = "select id from answers where user_id = :user_id && test_id = :test_id && question_id = :question_id limit 1";
                    $check = $answers->query($query,[
                        'user_id' => $user_id,
                        'question_id'=> $key,
                        'test_id'=> $id
                    ]);
                    
                    if($check)
                    {
                        
                        unset($arr['user_id']);
                        unset($arr['question_id']); 
                        unset($arr['test_id']);
    
                        $answer_id = $check[0]->id;
                        $answers->update($answer_id, $arr);
                    }else {
                        die("Error updating the data!");
                    }
                }
            }
            
        }

        $limit = 2;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        
        $results = false;
        $questions = $question->where('test_id',$id, 'asc', $limit, $offset); 
        $total_questions = (isset($questions) && is_array($questions)) ? count($questions) : 0;

        // get answers
        $saved_answers = $answers->get_answers($id,$user_id);

        // update answered tests if test is submitted
        $answered_tests->submit_answers($id,$user_id);

        // update answered tests if test is un_submitted
        $answered_tests->un_submit_answers($id,$user_id);

        // update answered tests if test is marked
        $answered_tests->set_test_as_marked($id,$user_id,get_mark_percentage($id,$user_id));
        
        // get answered_tests row
        $data['answered_test_row'] = $answered_tests->get_answered_test_row($id,$user_id);

        // dislay test is submitted
        $data['submitted'] = false;
        if(!empty($data['answered_test_row']) && $data['answered_test_row']->submitted === 1)
        {
            $data['submitted'] = true;
        }

        // dislay test is marked
        $data['marked'] = false;
        if(!empty($data['answered_test_row']) && $data['answered_test_row']->marked === 1)
        {
            $data['marked'] = true;
        }

        
        if($data['answered_test_row'])
        {
            $data['student'] = (new User())->first('user_id',$data['answered_test_row']->user_id);
        }

        if(isset($_GET['auto_mark']))
        {
            $original_quests = (new Test_question())->query("select question_id,correct_answer from test_questions where test_id = :test_id && (question_type = 'multiple' || question_type = 'objective')",[
                'test_id'=>$id,
            ]);
            
            if($original_quests){
                
                foreach ($original_quests as $original_quest) {
                    
                    $answer_row = (new Answer())->query("select id, answer from answers where user_id = :user_id && test_id = :test_id && question_id = :question_id limit 1",[
                        'user_id'=>$user_id,
                        'test_id'=>$id,
                        'question_id'=>$original_quest->question_id,
                    ]);
                    $teacher_answer = strtolower($original_quest->correct_answer);
                    $student_answer = strtolower($answer_row[0]->answer);

                    if ($teacher_answer == $student_answer) {
                        // this answer is correct
                        $answers->update($answer_row[0]->id,['answer_mark'=>1]);
                    }else{
                        // this answer is not correct
                        $answers->update($answer_row[0]->id,['answer_mark'=>2]);
                    }
                }
            }
            $this->redirect('mark_test/'. $id . "/". $user_id);
        }

        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['questions'] = $questions;
        $data['total_questions'] = $total_questions;
        $data['results']  = $results;
        $data['errors']  = $errors;
        $data['pager']  = $pager;
        $data['saved_answers'] = $saved_answers;

        $this->view('mark-test',$data);
    }

}