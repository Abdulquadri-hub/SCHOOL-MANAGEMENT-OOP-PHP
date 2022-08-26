<?php

/**
 * single_class controller
 */
class Single_class extends Controller
{
    function index($id = "") 
    {

        // $user = new User();
        $classes = new Classes_model();
        $row = $classes->first('class_id',$id);#row for the data 


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['classes', 'classes'];
        
        if($row)
        {
            $crumbs[] = [$row->class,''];
        }

        $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'lecturers';
        $this->view('single-class',[
            'row'=>$row,
            'crumbs'=>$crumbs,
            'page_tab'=>$page_tab,
        ]);
    }
}