<?php

/**
 * schools ccontroller
 */
class Schools extends Controller 
{
    
    public function index()
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $school = new School();

        $data = $school->findAll();
        

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Schools','Schools'];
        
        if (Auth::access('super_admin')) {
        $this->view('schools',[
            'rows'=>$data,
            'crumbs'=>$crumbs
        ]);
    }else {
        $this->View('access-denied');
    }
    }

    
    public function add() #add school
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = array();

        if (count($_POST) > 0 && Auth::access('super_admin'))
        {
            $school = new School();

            // validate infoamtion
            if ($school->validate($_POST)) {

                $_POST['date'] = date("Y-m-d H:i:s");

                $school->insert($_POST);

                $this->redirect('schools');
            }else {
                $errors = $school->errors;
            }
        }

        $crumbs[] = ['Dashboard',''];
        $crumbs[] = ['Schools','schools'];
        $crumbs[] = ['Add','add'];

        if (Auth::access('super_admin')) {
        $this->view('schools.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs
        ]);
        }else {
            $this->View('access-denied');
        }
    }

    public function edit($id = null) #edit school
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $school = new School();

        $errors = array();

        if (count($_POST) > 0 && Auth::access('super_admin'))
        {
            

            // validate infoamtion
            if ($school->validate($_POST)) {

                $school->update($id,$_POST);

                $this->redirect('schools');
            }else {
                $errors = $school->errors;
            }
        }

        $row = $school->where('id',$id);

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Schools','Schools'];
        $crumbs[] = ['Edit','Schools/edit'];

        if(Auth::access('super_admin')){
            $this->view('schools.edit',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs
            ]);
        }else {
            $this->View('access-denied');
        }
    }

    public function delete($id = null) #delete school
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $school = new School();

        $errors = array();

        if (count($_POST) > 0 && Auth::access('super_admin'))
        {

            $school->delete($id);
            $this->redirect('schools');  
        }

        $row = $school->where('id',$id);

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Schools','Schools'];
        $crumbs[] = ['Delete','Schools/delete'];

        if(Auth::access('super_admin')){
        $this->view('schools.delete',[
            'row'=>$row,
            'crumbs'=>$crumbs
        ]);
        }else{
        $this->View('access-denied');
        }
    }
}
