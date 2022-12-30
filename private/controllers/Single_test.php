<?php

/**
 * single_test controller
 */
class Single_test extends Controller
{
    function index($id = "") 
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
        }

        $page_tab = 'view';
        if (isset($_GET['disable'])) 
        {
            if ($row->disabled) 
            {
                $disabled = 0;
            }else {
                $disabled = 1;
            }
            $query = "update tests set disabled = $disabled where test_id = :test_id";
            $test->query($query,['test_id'=>$id]);
            $this->redirect('single_test/'.$id);
        }

        $student_scores = false;
        if(isset($_GET['tab']) && $_GET['tab'] == 'scores')
        {
            $page_tab = 'scores';
            $student_scores = (new Answered_test())->query("select * from answered_tests where test_id = :test_id order by score desc",['test_id'=>$id]);
        }

        $limit = 10;
        $pager = new Pager($limit);
        $offset = $pager->offset;

        $results = false;
        $questions = $question->where('test_id',$id); 

        $total_questions = 0;
        $total_questions = (is_array($questions)) ? count($questions) : $total_questions;

        $data['questions'] = $questions;
        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['results']  = $results;
        $data['errors']  = $errors;
        $data['pager']  = $pager;
        $data['total_questions'] = $total_questions;
        $data['student_scores'] = $student_scores;
        $this->view('single-test',$data);
    }

    //add test questions logic
    function addquestion($id = "") 
    {

        if (!Auth::access('lecturer')) 
        {
            $this->redirect('access_denied');
        }

        $errors = [];

        $test = new Test();
        $row = $test->first('test_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['tests', 'tests'];
        
        if($row)
        {
            $crumbs[] = [$row->test,''];
        }

        $page_tab = 'add-question';

        $limit = 2;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        
        $question = new Test_question();

        if (count($_POST) > 0) 
        {
            if (!$row->edited) 
            {
                $errors[] = "New question can not be added";
            }
            if ($question->validate($_POST)) 
            {
                if ($imagePath = upload_image($_FILES)) 
                {
                    $_POST['image'] = $imagePath;
                }
                
                $_POST['date'] = date('Y-m-d H:i:s');
                $_POST['test_id'] = $id;

                if(isset($_GET['type']) && $_GET['type'] == "multiple"){
                    $_POST['question_type'] = 'multiple';
                    $num = 0;
                    $arr = [];
                    $letters = ['A','B','C','D','E'];
                    foreach ($_POST as $key => $value) 
                    {
                        if (strstr($key, 'choice')) 
                        {
                            $arr[$letters[$num]] = $value;
                            $num++;
                        }
                    }
                    $_POST['choices'] = json_encode($arr);
                    
                }else
                if(isset($_GET['type']) && $_GET['type'] == "objective"){
                    $_POST['question_type'] = 'objective';
                }else {
                    $_POST['question_type'] = 'subjective';
                }

                $question->insert($_POST);
                $this->redirect('single_test/'.$id);
            }else {
                $errors = array_merge($question->errors,$errors);;
            }
        }

        $results = false;

        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['results']  = $results;
        $data['errors']  = $errors;
        $data['pager']  = $pager;

        $this->view('single-test',$data);
    }

    //edit test questions logic
    function editquestion($id = "",$question_id = '') 
    {

        if (!Auth::access('lecturer')) 
        {
            $this->redirect('access_denied');
        }

        $errors = [];

        $test = new Test();
        $row = $test->first('test_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['tests', 'tests'];
        
        if($row)
        {
            $crumbs[] = [$row->test,''];
        }

        $page_tab = 'edit-question';

        $limit = 2;
        $pager = new Pager($limit);
        $offset = $pager->offset;
        
        $question = new Test_question();
        $question_row = $question->first('question_id', $question_id);

        if (count($_POST) > 0) 
        {
            if (!$row->edited) 
            {
                $errors[] = "Editing of this question is disabled";
            }

            if ($question->validate($_POST) && count($errors) == 0) 
            {
                if ($imagePath = upload_image($_FILES)) 
                {
                    $_POST['image'] = $imagePath;
                    if(file_exists($question->image)){
                        $old_image = $question->image;
                        unlink($old_image);
                    }
                }

                $type = '';
                if(isset($_GET['type']) && $_GET['type'] == "multiple"){
                    $_POST['question_type'] = 'multiple';
                    $num = 0;
                    $arr = [];
                    $letters = ['A','B','C','D','E'];
                    foreach ($_POST as $key => $value) 
                    {
                        if (strstr($key, 'choice')) 
                        {
                            $arr[$letters[$num]] = $value;
                            $num++;
                        }
                    }
                    $_POST['choices'] = json_encode($arr);
                    $type = '?type=multiple';
                }else
                if(isset($_GET['type']) && $_GET['type'] == "objective"){
                    $type = '?type= objective';
                }
                
                unset($_POST['choice0']);
                unset($_POST['choice1']);
                unset($_POST['choice2']);
                unset($_POST['choice3']);
                unset($_POST['choice4']);
                unset($_POST['choice5']);
                $question->update($question_row->id,$_POST);
                $this->redirect('single_test/editquestion/'.$id ."/".$question_id.$type);
            }else {
                $errors = array_merge($question->errors,$errors);
            }
        }

        $results = false;

        $data['row']      = $row;
        $data['crumbs']   = $crumbs;
        $data['page_tab'] = $page_tab;
        $data['results']  = $results;
        $data['question_row']  = $question_row;
        $data['errors']  = $errors;
        $data['pager']  = $pager;

        $this->view('single-test',$data);
    }

    //delete test questions logic
    function deletequestion($id = "",$question_id = '') 
    {
        if (!Auth::access('lecturer')) 
        {
            $this->redirect('access_denied');
        }
    
            $errors = [];
    
            $test = new Test();
            $row = $test->first('test_id',$id);#row for the data 
    
    
            $crumbs[] = ['Dashboard', ''];
            $crumbs[] = ['tests', 'tests'];
            
            if($row)
            {
                $crumbs[] = [$row->test,''];
                
            }

    
            $page_tab = 'delete-question';
    
            $limit = 2;
            $pager = new Pager($limit);
            $offset = $pager->offset;
            
            $question = new Test_question();
            $question_row = $question->first('question_id', $question_id);
    
            if (!$row->edited) 
            {
                $errors[] = "this test question can not be deleted";
            }

            if (count($_POST) > 0 && count($errors) == 0) 
            {
                if (Auth::access('lecturer')) 
                {
                    $question->delete($question_row->id);
                    if(file_exists($question->image)){
                        $old_image = $question->image;
                        unlink($old_image);
                    }
                    $this->redirect('single_test/'.$id);
                }
            }
            $results = false;
    
            $data['row']      = $row;
            $data['crumbs']   = $crumbs;
            $data['page_tab'] = $page_tab;
            $data['results']  = $results;
            $data['question_row']  = $question_row;
            $data['errors']  = $errors;
            $data['pager']  = $pager;
    
            $this->view('single-test',$data);
    }
    

}