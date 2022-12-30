<?php

/**
 * Take_test controller
 */
class Take_test extends Controller
{
    function index($id = "") 
    {

        if (!Auth::access('student')) 
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

            // store the answered test
            $arr1['user_id'] = Auth::getUser_id();
            $arr1['test_id'] = $id;

            // check if the answered test has been stored already

            $check = $answered_tests->query(
                "select id from answered_tests where test_id = :test_id && user_id = :user_id limit 1",$arr1
            );

            if (!$check) {
                $arr1['date'] = date('Y-m-d H:i:s');
                $answered_tests->insert($arr1);
            }
            
            // store the answers 
            foreach ($_POST as $key => $value) 
            {
                if (is_string($key)) 
                {
                    $arr['user_id'] = Auth::getUser_id();
                    $arr['question_id'] = $key;
                    $arr['test_id'] = $id;
                    $arr['answer'] = trim($value);
                    $arr['date'] = date('Y-m-d H:i:s');
    
                    $query = "select id from answers where user_id = :user_id && test_id = :test_id && question_id = :question_id limit 1";
                    $check = $answers->query($query,[
                        'user_id' => Auth::getUser_id(),
                        'question_id'=> $key,
                        'test_id'=> $id
                    ]);
    
                    if($check)
                    {
                        unset($arr['user_id']);
                        unset($arr['question_id']); 
                        unset($arr['test_id']);
                        unset($arr['date']);
    
                        $answer_id = $check[0]->id;
                        $answers->update($answer_id, $arr);
                    }else {
                        $answers->insert($arr);
                    }
                }
            }
            
        }

        $limit = 2;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        
        $results = false;
        $questions = $question->where('test_id',$id, 'desc', $limit, $offset); 
        $total_questions = (isset($questions) && is_array($questions)) ? count($questions) : 0;

        // get answers
        $saved_answers = $answers->get_answers($id,Auth::getUser_id());

        // update answered tests if test is submitted
        $submitted_answers = $answered_tests->submit_answers($id,Auth::getUser_id());
        
        // get answered_tests row
        $data['answered_test_row'] = $answered_tests->get_answered_test_row($id,Auth::getUser_id());

        // // dislay test is submitted
        $data['submitted'] = false;
        if(!empty($data['answered_test_row']) && $data['answered_test_row']->submitted === 1)
        {
            $data['submitted'] = true;
        }

        $data['student'] = (new User())->first('user_id',Auth::getUser_id());


        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['questions'] = $questions;
        $data['total_questions'] = $total_questions;
        $data['results']  = $results;
        $data['errors']  = $errors;
        $data['pager']  = $pager;
        $data['saved_answers'] = $saved_answers;

        $this->view('take-test',$data);
    }

}