<?php

/**
 * classes ccontroller
 */
class Classes extends Controller 
{
    
    public function index()
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $classes = new Classes_model();
        // show($classes);

        $data = $classes->findAll();

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Classes','classes'];

        $this->view('classes',[
            'rows'=>$data,
            'crumbs'=>$crumbs
        ]);
    }

    
    public function add() #add classes
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $errors = array();

        if (count($_POST) > 0)
        {
            $classes = new Classes_model(); 

            // validate infoamtion
            if ($classes->validate($_POST)) {

                $_POST['date'] = date("Y-m-d H:i:s");

                $cl = $classes->insert($_POST);
                

                $this->redirect('classes');
            }else {
                $errors = $classes->errors;
            }
        }

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Classes','Classes'];
        $crumbs[] = ['Add','Classes/add'];

        $this->view('classes.add',[
            'errors'=>$errors,
            'crumbs'=>$crumbs
        ]);
    }

    public function edit($id = null) #edit classes
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $classes = new Classes_model();

        $errors = array();

        if (count($_POST) > 0)
        {
            

            // validate infoamtion
            if ($classes->validate($_POST)) {

                $classes->update($id,$_POST);

                $this->redirect('classes');
            }else {
                $errors = $classes->errors;
            }
        }

        $row = $classes->where('id',$id);

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Classes','Classes'];
        $crumbs[] = ['Edit','Classes/edit'];

        $this->view('classes.edit',[
            'row'=>$row,
            'errors'=>$errors,
            'crumbs'=>$crumbs
        ]);
    }

    public function delete($id = null) #delete classes
    {
        if (!Auth::loggedIn()) 
        {
            $this->redirect('login');
        }

        $classes = new Classes_model();

        $errors = array();

        if (count($_POST) > 0)
        {

            $classes->delete($id);
            $this->redirect('Classes');  
        }

        $row = $classes->where('id',$id);

        $crumbs[] = ['Dashboad',''];
        $crumbs[] = ['Classes','Classes'];
        $crumbs[] = ['Delete','Classes/delete'];

        $this->view('classes.delete',[
            'row'=>$row,
            'crumbs'=>$crumbs
        ]);
    }
}
