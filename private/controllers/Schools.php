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

        $this->view('schools',[
            'rows'=>$data,
            'crumbs'=>$crumbs
        ]);
    }

    
    public function add() #add school
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = array();

        if (count($_POST) > 0)
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

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Schools','Schools'];
        $crumbs[] = ['Add','Schools/add'];

        $this->view('schools.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs
        ]);
    }

    public function edit($id = null) #edit school
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $school = new School();

        $errors = array();

        if (count($_POST) > 0)
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

        $this->view('schools.edit',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs
        ]);
    }

    public function delete($id = null) #delete school
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $school = new School();

        $errors = array();

        if (count($_POST) > 0)
        {

            $school->delete($id);
            $this->redirect('schools');  
        }

        $row = $school->where('id',$id);

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Schools','Schools'];
        $crumbs[] = ['Delete','Schools/delete'];

        $this->view('schools.delete',[
            'row'=>$row,
            'crumbs'=>$crumbs
        ]);
    }
}
