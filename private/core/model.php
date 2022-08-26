<?php

/**
 * model main class
 */
class Model extends Database 
{
    
    public $errors = array();
    

    function __construct()
    {
        // check if the property is not set and then use it
        
        if (!property_exists($this, 'table'))
        {
            $this->table = strtolower('User')."s";
            
        }
        if (!property_exists($this, 'table'))
        {
            $this->table = strtolower('school')."s";
            
        }
    }
    
    public function first($column, $value)
    {
        // run a query
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value";
        $data =  $this->query($query,[
            'value'=>$value
        ]);

        // run func after select

        if(is_array($data))
        {
        if (property_exists($this, 'afterSelect'))
        {
            foreach($this->afterSelect as $func)
            {
                $data = $this->$func($data);
            }
        }
        }

        // return the first item
        if(is_array($data))
        {
            $data = $data[0];
        }
        return $data;
    }

    // interracting with db
    public function where($column, $value)
    {
        // run a query
        $column = addslashes($column);
        $query = "select * from $this->table where $column = :value";
        return $this->query($query,[
            'value'=>$value
        ]);
    }

    public function findAll()
    {
        // run a query
        $query = "select * from $this->table";
        return $this->query($query);

    }

    public function insert($data)
    {
        // // remove unwanted columns
        if (property_exists($this, 'allowedCol'))
            {
                foreach($data as $key => $column)
                {
                    if (!in_array($key, $this->allowedCol))
                    {
                        unset($data[$key]);
                    }
                }
        }

        // // run func before inserting
        if (property_exists($this, 'beforeInsert'))
        {
            foreach($this->beforeInsert as $func)
            {
                $data = $this->$func($data);
            }
        }

        // run a query
        // get the keys
        $keys = array_keys($data);
        // implode into the keys
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);

        $query = "insert into $this->table ($columns) values (:$values)";
        return $this->query($query,$data);

    }

    public function update($id,$data)
    {
        print_r($data);

        // run a query
        // set str to empty
        $str = "";
        // use a foreach to set the keys
        foreach ($data as $key => $value) {
            # code...
            $str .= $key. "=:". $key. ",";
        }
        // trim $str
        $str = trim($str, ",");
        // set $id as array
        $data['id'] = $id;
        $query = "update $this->table set $str where id = :id";
        return $this->query($query,$data);
    }

    public function delete($id)
    {
        // run a query
        $query =  "delete from $this->table where id = :id";
        $data['id'] = $id;
        return $this->query($query, $data);

    }
}
// model->where('firstname', 'john')
