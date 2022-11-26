<?php

class Class_student extends Class_student_model {

            // allowed [columns] 
            protected $allowedCol = [
                'user_id',
                'class_id',
                'school_id',
                'disabled',
                'date',
            ];
    
            // functions before insert
            protected $beforeInsert = [
            'make_school_id',
            ];
    
        // get a specific function afterSelect
        protected $afterSelect = [
            'get_user',
        ];
    
        
        // function  to get user_id
        public function make_school_id($data)
        {
            if (isset($_SESSION['USER']->school_id)) 
            {
                $data['school_id'] = $_SESSION['USER']->school_id;
            }
            return $data;
        }
    
        // get user who created the sclass
        public function get_user($data)
        {
            // instantiate user
            $user = new User();
            foreach ($data as $key => $row) {
                # code...
                if (isset($row->user_id)) 
                {
                    $result = $user->where('user_id',$row->user_id);
                    $data[$key]->user = is_array($result) ? $result[0] : false;
                }   
            }
                return $data;
        }
}