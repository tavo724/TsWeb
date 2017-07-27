<?php

namespace App\Model;

class EmployeeModel
{
    private $data = [];

    public function getData($array)
    {
        $this->data['id']       = $array['id'];
        $this->data['name']     = $array['name'];
        $this->data['email']    = $array['email'];
        $this->data['position'] = $array['position'];
        $this->data['salary']   = $array['salary'];

        return $this->obj;
    }

    public function getInfo($array)
    {
        $this->data['id']       = $array['id'];
        $this->data['name']     = $array['name'];
        $this->data['email']    = $array['email'];
        $this->data['phone']    = $array['phone'];
        $this->data['address']  = $array['address'];
        $this->data['address']  = $array['address'];
        $this->data['position'] = $array['position'];
        $this->data['salary']   = $array['salary'];
        $this->data['skills']   = $array['skills'];

        return $this->obj;
    }
}
