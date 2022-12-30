<?php

/**
 * model main class
 */
class Model extends Database 
{
    
    public $errors = array();
    

    function __construct()
    {
        
        if (!property_exists($this, 'table'))
        {
            $this->table = strtolower($this::class)."s";
        }
    }

    protected function get_primary_key($table)
    {
        $query = "SHOW KEYS FROM $table WHERE key_name = 'PRIMARY'";
        $db = new Database();
        $data = $db->query($query);
        if (!empty($data[0])) 
        {
            return $data[0]->Column_name;
        }
        return 'id';
    }
    
    public function first($column, $value, $orderby = 'desc')
    {
        // run a query
        $column = addslashes($column);
        $primary_key = $this->get_primary_key($this->table);
        $query = "select * from $this->table where $column = :value order by $primary_key $orderby";
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

    public function where($column, $value, $orderby = 'desc', $limit = 10, $offset = 0)
    {
        // run a query
        $column = addslashes($column);
        $primary_key = $this->get_primary_key($this->table);
        $query = "select * from $this->table where $column = :value order by $primary_key $orderby limit $limit offset $offset";
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
        return $data;
    }

    public function findAll($orderby = 'desc',$limit = 100, $offset = 0)
    {
        // run a query
        $primary_key = $this->get_primary_key($this->table);
        $query = "select * from $this->table order by $primary_key $orderby limit $limit offset $offset";
        $data =  $this->query($query);

        
        // // run func afterSelect
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
        return $data;

    }

    public function insert($data)
    {
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

    if (property_exists($this, 'beforeUpdate'))
    {
        foreach($this->beforeUpdate as $func)
        {
            $data = $this->$func($data);
        }
    }


        $str = "";
        foreach ($data as $key => $value) {
            # code...
            $str .= $key. "=:". $key. ",";
        }
        $str = trim($str, ",");
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
