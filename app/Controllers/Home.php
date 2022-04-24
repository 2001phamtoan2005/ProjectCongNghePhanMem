<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Login;
use App\Models\PositionsModel;
use App\Models\ConfigModel;
use App\Models\EquipmentsModel;

class Home extends BaseController
{
    public function index()
    {
        /*
        $locale = $this->request->getLocale();
        $data =[
            'locale' => $locale
        ];
        return view('layout/master',$data);
        */
        return view('Login/login');
    }
    public function login()
    {
        return view('Login/login');
    }
    public function userList()
    {
        return view("User/index");
    }
    public function home()
    {
        $model=new EquipmentsModel();
        $year=$model->getYear();
        $name=$model->getname();
        $total=$model->getTotal();
        $new=$model->getNew();
        $old=$model->getOld();
        $dataYear=[];
        foreach($year as $item)
        {
            foreach($name as $type)
            {
                $totalyear=$model->getEquipInYear($item['label'],$type['name']);
                $rowdata=[
                    'name'=>$type['name'],
                    'year'=>$item['label'],
                    'total'=>$totalyear
                ];
                array_push($dataYear,$rowdata);
            }
        }
        $data = [
            "year" => $year,
            'totalyear'=>count($year),
            'rowdata'=>$rowdata,
            'name'=>$name,
            'old'=>$old,
            'new'=>$new,
            'use'=>$model->getUse(),
            'total'=>$total,
            'dataYear'=>$dataYear,
        ];
        // echo(json_encode($data));
        // exit;
        //echo(json_encode($dataYear));
        // foreach($dataYear as $datacell)
        // {
        //     if($datacell['year']==2015&&$datacell['name']=='laptop')
        //     {
        //         $cell=$datacell['total'];
        //         echo(json_encode($cell[0]['total']));
        //     }
        // }
        // exit;
        return view('Homes/home',$data);
    }
    public function logout()
    {
        $session=session();
        $session->destroy();
        return view('Login/login');
    }
    //tra ve view position
    public function position()
    {
        return view("Master/position");
    }
    //tra ve view department
    public function department()
    {
        return view("Department/department");
    }
    //get data for chart
    public function getlistconfig()
    {
        $model=new ConfigModel();
        $model_equip= new EquipmentsModel();
        $year ='All';// $this->request->getVar('year');
        $databar=$model->typelistforchart();
        $dataline=$model_equip->getUsingEquipment();
        $pielaptop=$model_equip->getLaptop($year);
        $piepc=$model_equip->getPC($year);
        $piemonitor=$model_equip->getMonitor($year);
        $data=[
            'barchart'=>$databar,
            'linechart'=>$dataline,
            'pieLaptop'=>$pielaptop,
            'piePC'=>$piepc,
            'pieMonitor'=>$piemonitor,
        ];
        return json_encode($data);
    }
    //get data chart by year
    public function updatechart($year)
    {
        try{
            //helper(['form', 'url']);
            $model_equip= new EquipmentsModel();
            //$year = $this->request->getVar('year');
            if($year==null)
                $year='All';  
            $pielaptop=$model_equip->getLaptop($year);
            $piepc=$model_equip->getPC($year);
            $piemonitor=$model_equip->getMonitor($year);
            $data=[
                //'year'=>$year,
                'pieLaptop'=>$pielaptop,
                'piePC'=>$piepc,
                'pieMonitor'=>$piemonitor,
            ];
            return json_encode($data);
        }
        catch (\Exception $e) {
            log_message("error", ' coursecontroler funtron update chart '.$e->getMessage());
        }
    }
}
