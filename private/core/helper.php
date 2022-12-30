<?php

// function to create a value for input(sticky input);

// get the var
function get_var($key, $default = "", $method = 'get')
{
    $data = $_POST;
    if($method == 'get')
    {
        $data = $_GET;
    }
    if (isset($data[$key])) {

        return $data[$key];
    }
    return $default;
}
// get_select
function get_select($key,$value)
{
    if (isset($_POST[$key])) {

        if ($_POST[$key] == $value)
        {
            return "selected";
        }
        return "";
    }

}
//get escape string
function esc($var)
{
    return htmlspecialchars($var);
} 
// create a random string for user_id and school_id

function random_string($length) 
{

    $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y', 'Z');

    $text = "";
    for($x = 0; $x < $length; $x++) { 
        
        $random = rand(0,61);
        $text .= $array[$random];
    }
    return $text;
}

function get_date($date)
{
    return date("jS M, Y",strtotime($date));
}
function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    
}

function get_image($image,$gender = 'female')
{
    if (!file_exists($image)) {
        $image = ASSET.'/user.png';
        if ($gender == 'female') {
            $image = ASSET.'/userf.png';
        }
    }else {
        $class = new Image_crop();
        $image = ROOT . "/" . $class->profile_thumb($image);
    }
    return $image;
}

function views_path($include){

    if (file_exists("../private/views/includes/". $include . ".inc.php"))
    {
        return ("../private/views/includes/". $include . ".inc.php");
    }else {
        return ("../private/views/404.view.php");
    }
}

function upload_image($FILES)
{
    if (count($_FILES) > 0) 
    {
        $image = isset($_FILES['image']) ? $_FILES['image'] : "";
        $allowed[] = 'image/jpeg';
        $allowed[] = 'image/jpg';

        if (!empty($image['name']) && $image['error'] === 0) 
        {
            if (in_array($image['type'], $allowed)) 
            {
                $folder = "asset/test-images/";
                if (!file_exists($folder)) 
                {
                    mkdir($folder, 0777, true);
                }
                $destination = $folder . random_string(5) . "/" . $image['name'];
                mkdir(dirname($destination));
                move_uploaded_file($image['tmp_name'], $destination);
                return $destination;
            }
        }
    }
}

function taken_test($test_id)
{
    return false;
}

function can_take_test($my_test_id)
{
        // 
        $class = new Classes_model();
        $my_tbl = 'class_students';

        // 
        if (Auth::getRank() != 'student') {
            return false;
        }

        // 
        $student_class_on_profile = new Class_student();
        $query = "select * from $my_tbl where user_id = :user_id && disabled = 0";
        $data['student_class_on_profile'] = $student_class_on_profile->query($query,['user_id'=>Auth::getUser_id()]);

        // 
        $data['stud_class'] = [];
        if ($data['student_class_on_profile']) {
            foreach ($data['student_class_on_profile'] as $key => $arow) {
                $data['stud_class'][] = $class->first('class_id', $arow->class_id);
            }
        }

        $class_ids = [];
        foreach($data['stud_class'] as $key=> $class_row)
        {
            $class_ids[] = $class_row->class_id;
        }
        $class_row_ids = "'". implode("','", $class_ids) . "'";
        $test_model = new Test();
        $query = "select * from tests where class_id in ($class_row_ids)";
        $tests = $test_model->query($query);
        $data['test_rows'] = $tests;
        if ($data['test_rows']) {
            $my_test = array_column($tests, 'test_id');
            
            if (in_array($my_test_id, $my_test)) {
                return true;
            }
        }
    return false;
}

    function get_answers($saved_answers,$question_id)
    {
        if (!empty($saved_answers)) 
        {
            foreach ($saved_answers as $answer_row) {
                # code...
                if($answer_row->question_id == $question_id)
                {
                    return $answer_row->answer;
                }
            }
        }
        return '';
    }

    function get_marks($saved_answers,$question_id)
    {
        if (!empty($saved_answers)) 
        {
            foreach ($saved_answers as $answer_row) {
                # code...
                if($answer_row->question_id == $question_id)
                {
                    return $answer_row->answer_mark;
                }
            }
        }
        return '';
    }

    function get_answer_percentage($test_id,$user_id)
    {
        $question = new Test_question();
        $query = "select * from test_questions where test_id = :test_id";
        $all_questions = $question->query($query,[
            'test_id'=> $test_id
        ]);

        $answers = new Answer();
        $query = "select question_id, answer from answers where user_id = :user_id && test_id = :test_id";
        $saved_answers = $answers->query($query,[
            'user_id' => $user_id,
            'test_id'=> $test_id
        ]);
        
        $total_answer_count = 0;
        if (!empty($all_questions)) {
            foreach ($all_questions as $quest) 
            {
                $answer = get_answers($saved_answers,$quest->question_id);
                if(trim($answer) !== ""){
                    $total_answer_count++;
                }
            }
        }
        if ($total_answer_count > 0) {
            $total_questions = count($all_questions);
            return round(($total_answer_count / $total_questions)* 100, 2);
        }
        return 0;
    }

    function get_mark_percentage($test_id,$user_id)
    {
        $question = new Test_question();
        $query = "select * from test_questions where test_id = :test_id";
        $all_questions = $question->query($query,[
            'test_id'=> $test_id
        ]);

        $answers = new Answer();
        $query = "select question_id, answer, answer_mark from answers where user_id = :user_id && test_id = :test_id";
        $saved_answers = $answers->query($query,[
            'user_id' => $user_id,
            'test_id'=> $test_id
        ]);
        
        $total_answer_count = 0;
        if (!empty($all_questions)) {
            foreach ($all_questions as $quest) 
            {
                $answer_mark = get_marks($saved_answers,$quest->question_id);
                if($answer_mark > 0){
                    $total_answer_count++;
                }
            }
        }
        if ($total_answer_count > 0) {
            $total_questions = count($all_questions);
            return round(($total_answer_count / $total_questions)* 100, 2);
        }
        return 0;
    }

    function get_score_percentage($test_id,$user_id)
    {
        $question = new Test_question();
        $query = "select * from test_questions where test_id = :test_id";
        $all_questions = $question->query($query,[
            'test_id'=> $test_id
        ]);

        $answers = new Answer();
        $query = "select question_id, answer, answer_mark from answers where user_id = :user_id && test_id = :test_id";
        $saved_answers = $answers->query($query,[
            'user_id' => $user_id,
            'test_id'=> $test_id
        ]);
        
        $total_answer_count = 0;
        if (!empty($all_questions)) {
            foreach ($all_questions as $quest) 
            {
                $answer_mark = get_marks($saved_answers,$quest->question_id);
                if($answer_mark == 1){
                    $total_answer_count++;
                }
            }
        }
        if ($total_answer_count > 0) {
            $total_questions = count($all_questions);
            return round(($total_answer_count / $total_questions)* 100, 2);
        }
        return 0;
    }

    function get_unsubmitted_test()
    {
        if(Auth::access('student')){
        $query = "select * FROM tests where class_id in (SELECT class_id FROM `class_students` where user_id = :user_id) and test_id not in (select test_id from answered_tests where submitted = 1 && user_id = :user_id);
        ";
        $data = (new Test())->query($query,['user_id'=>Auth::getUser_id()]);
        if($data){
            return  count($data);
        }
        }
        return  0;
    }

    function get_unsubmitted_test_rows()
    {
        if(Auth::access('student')){
        $query = "select test_id FROM tests where class_id in (SELECT class_id FROM `class_students` where user_id = :user_id) and test_id not in (select test_id from answered_tests where submitted = 1 && user_id = :user_id);
        ";
        $data = (new Test())->query($query,['user_id'=>Auth::getUser_id()]);
        
        if($data){
            return array_column($data, "test_id");
        }
    }
        return [];
    }

    function get_years()
    {
        $arr = [];
        $row = (new Database())->query("select date from classes order by id asc limit 1");
        if($row){
            // get the date from classes
            $year = date("Y",strtotime($row[0]->date));
            $arr[] = $year;

            $current_year = date("Y",time());
            $current_month = date("m",time());

            while ($year <= $current_year) {
                $year += 1;
                $arr[] = $year;
            }
        }else {
            $arr[] = date("Y",time());
        }
        rsort($arr);
        return $arr ;
    }

    switch_year();
    function switch_year()
    {
        if(!empty($_GET['school_year']))
        {
            $year = (int)$_GET['school_year'];
            $_SESSION['USER']->year = $year;
        }
    }


    // function filter_by_semester()
    // {
    //     if($_GET['first_semester'])
    //     {

    //     }
    // }

    // function get_semesters()
    // {
    //     $arr = [];
    //     $row = (new Database())->query("select date from classes order by id asc limit 1");
    //     if($row){
    //         // get the date from classes
    //         $month = date("m",strtotime($row[0]->date));
    //         $arr[] = $month;

    //         $current_month = date("m",time());


    //         for($i = $month; $i < $current_month - 5; $i++) {
    //             $arr[] = $month += 4;
    //             $ar = implode(",",($arr));
    //             // echo $ar;
    //         }
    //     }else {
    //         $arr[] = date("m",time());
    //     }
    //     return $ar ;
    // }

    // function get_correct_year_val()
    // {
    //     $text = '';

    //     if(!empty($_GET))
    //     {
    //         foreach ($_GET as $key => $value) {
    //             if ($key != "url") 
    //             {
    //                 $text .= "<input type = 'hidden' name='$key' value='$value' />";
    //             }
    //         }
    //     }

    //     return $text;
    // }