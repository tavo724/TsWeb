<?php

namespace App\Controller;

require APP_ROOT.'/src/App/Model/EmployeeModel.php';
require APP_ROOT.'/src/Helper/ArrayHelper.php';

class EmployeeController
{
    private $view;
    private $jsonFile = APP_ROOT."/data/employees.json";
    private $data;

    public function __construct($view)
    {
        $this->view = $view;
        $this->loadJsonData();
    }

    private function loadJsonData()
    {
        $this->data = json_decode(file_get_contents($this->jsonFile), true);
    }

    /**
     * Index Action
     */
    public function index($request, $response, $args)
    {
        return $this->view->render($response, 'employees/index.twig', ['employees' => $this->getAll()]);
    }

    /**
     * Buscar un colaborador por el identificador
     */
    public function detailById($request, $response, $args)
    {
        return $this->view->render($response, 'employees/detail.twig', [
            'employee' => $this->getbyID($request->getAttribute('id'))
        ]);
    }

    /**
     * Buscar un colaborador por el email
     */
    public function searchByEmail($request, $response, $args)
    {
        return $this->view->render($response, 'employees/detail.twig', [
            'employee' => $this->getByEmail($request->getParam('email'))
        ]);
    }

    /**
     * Buscar colaboradores y retornar XML
     */
    public function searchBySalary($request, $response, $args)
    {
        $s_min       = $request->getParam('min');
        $s_max       = $request->getParam('max');
        $data        = $this->getAllBySalary($s_min, $s_max);
        $xml         = new \SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><Salaries></Salaries>");
        $node        = $xml->addChild('request');
        $arrayHelper = new \Helper\ArrayHelper();
        $arrayHelper->convertArrayXml($data, $node);
        $res         = $response->withHeader('Content-type', 'text/xml');
        $res->getBody()->write($xml->asXML());
        return $res;
    }

    private function getAll()
    {
        $total     = count($this->data);
        $employees = [];

        for ($i = 0; $i < $total; $i++) {
            $obj = new \App\Model\EmployeeModel();
            $employees[] = $obj->getInfo($this->data[$i]);
        }

        return $employees;
    }

    private function getbyID($id)
    {
        $index = array_search($id, array_column($this->data, 'id'));
        if (is_bool($index)) {
            return null;
        } else {
            $obj = new \App\Model\EmployeeModel();
            return $obj->getInfo($this->data[$index]);
        }
    }

    private function getByEmail($email)
    {
        $idx = array_search($email, array_column($this->data, 'email'));
        if (is_bool($idx)) {
            return null;
        } else {
            $obj = new \App\Model\EmployeeModel();
            return $obj->getInfo($this->data[$idx]);
        }
    }

    private function getAllBySalary($s_min, $s_max)
    {
        $len  = count($this->data);
        $objs = [];

        for ($i = 0; $i < $len; $i++) {
            $s = substr($this->data[$i]['salary'], 1);
            $s = str_replace(',', '', $s);
            if ($s >= $s_min && $s <= $s_max) {
                $objs[] = ['item' => $this->data[$i]];
            }
        }

        return $objs;
    }

}
