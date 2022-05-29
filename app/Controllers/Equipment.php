<?php

namespace App\Controllers;
use App\Models\ConfigModel;
use App\Models\EquipmentsModel;
use CodeIgniter\I18n\Time;

class Equipment extends BaseController
{
    public function index()
    {
        try {
            helper(['form', 'url']);
            $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
            $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
            $model=new ConfigModel();
            $data['status']=$model->getStatusEquip();
            // echo(json_encode($data));
            // exit;
            return view('Equipment/index', $data);
        } catch (\Exception $e) {
            log_message("error", ' Equipmentcontroler funtron indexEquipment ' . $e->getMessage());
        }
    }


    public function searchequipment()
    {

        // try {
        //     $name = trim($_GET['name']);
        //     $purchasedatefrom = trim($_GET['purchasedatefrom']);
        //     $warrantyperiodfrom = trim($_GET['warrantyperiodfrom']);
        //     $Equipmenttype = trim($_GET['Equipmenttype']);
        //     $purchasedateto = trim($_GET['purchasedateto']);
        //     $warrantyperiodto = trim($_GET['warrantyperiodto']);
        //     $series = trim($_GET['series']);
        //     $position = trim($_GET['position']);
        //     $manufacture=trim($_GET['manufacture']);
        //     $status=trim($_GET['status']);
        //     $json_data = $this->EquipmentsModel->searchequipment($name, $purchasedatefrom, $warrantyperiodfrom, $Equipmenttype, $purchasedateto, $warrantyperiodto, $series, $position,$manufacture,$status);

        //     echo json_encode($json_data);
        // } catch (\Exception $e) {
        //     log_message("error",  'searchequipment ' . $e->getMessage());
        // }
        $model=new EquipmentsModel();
        $name = $this->request->getVar('name');
        $purchasedatefrom = $this->request->getVar('purchasedatefrom');
        $warrantyperiodfrom = $this->request->getVar('warrantyperiodfrom');
        $Equipmenttype = $this->request->getVar('Equipmenttype');
        $purchasedateto = $this->request->getVar('purchasedateto');
        $warrantyperiodto = $this->request->getVar('warrantyperiodto');
        $series = $this->request->getVar('series');
        $position = $this->request->getVar('position');
        $manufacture=$this->request->getVar('manufacture');
        $status=$this->request->getVar('status');
        $start = $this->request->getVar('start');
        $length = $this->request->getVar('length');
        //$json_data = $this->EquipmentsModel->searchequipment($name, $purchasedatefrom, $warrantyperiodfrom, $Equipmenttype, $purchasedateto, $warrantyperiodto, $series, $position,$manufacture,$status,$start,$length);
        $json_data = $this->EquipmentsModel->searchequipment(null, null, null, null, null, null); 
        //$json_data=$model->searchequipment($name);
        
        echo json_encode($json_data);        
    }
    public function registerEquipment()
    {
        try {
            helper(['form', 'url']);
            $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
            $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
            
            return view('Equipment/register', $data);
        } catch (\Exception $e) {
            log_message("error", ' Equipmentcontroler funtron registerEquipment ' . $e->getMessage());
        }
    }
    public function addequipment()
    {
        try {
            helper(['form', 'url']);


            $inputs = $this->validate([
                'Employeeid' => [
                    'label' => 'Employeeid',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  course Employeeid.',

                    ]
                ],
                'Name' => [
                    'label' => 'Name',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  Equipment  name.',

                    ]
                ],
                'Equipmenttype' => [
                    'label' => 'Equipmenttype',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  Equipment type.',

                    ]
                ],

                'manufacture' => [
                    'label' => 'manufacture',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  manufacture.',

                    ]
                ],
                'purchasedate' => [
                    'label' => 'purchasedate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  purchase date.',

                    ]
                ],
                'warrantyperiod' => [
                    'label' => 'warrantyperiod',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  warranty period.',

                    ]
                ],
                'series' => [
                    'label' => 'series',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  series .',

                    ]
                ]
            ]);


            if (!$inputs) {
                $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
                $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
                return view('Equipment/register', $data, [
                    'validation' => $this->validator
                ]);
            } else {
                $model = $this->CourseDetailsModel;

                $objDateTime = Time::now();

                $filename = $_FILES['Image']['name'];
                $base64 = '';
                if ($filename != '') {
                    /* Location */
                    $location = "../public/fileupload" . '/' . $filename;
                    $extension = pathinfo($location, PATHINFO_EXTENSION);
                    if ($extension != '') {
                        move_uploaded_file($_FILES['Image']['tmp_name'], $location);
                        $imagedata = file_get_contents($location);
                        // alternatively specify an URL, if PHP settings allow
                        $base64 = base64_encode($imagedata);
                        unlink($location);
                    }
                }
               
               
                $profileid = $this->CourseDetailsModel->getprofileid( $this->request->getVar('Employeeid'));
                if ($profileid == null) {
                    session()->setFlashdata('failed', 'nhân viên không tồn tại');
                    $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
                $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
                return view('Equipment/register', $data, [
                    'validation' => $this->validator
                ]);
                } else {

                    $createarray = array(
                        'equipment_id' => $this->request->getVar('equipmentid'),
                        'profile_id'  => (int) $profileid->id,
                        'type_id'  => $this->request->getVar('Equipmenttype'),
                        'name'  => $this->request->getVar('Name'),
                        'manufacture_id'  => $this->request->getVar('manufacture'),
                        'purchase_date'  => $this->request->getVar('purchasedate'),
                        'warranty_period'  => $this->request->getVar('warrantyperiod'),
                        'series' =>  $this->request->getVar('series'),
                        'position' =>  $this->request->getVar('position'),
                        'note' =>  $this->request->getVar('Note'),
                        'img' =>  $base64,
                        'created_time' => $objDateTime->toDateTimeString(),
                        'created_user' => null
                    );
                    if ($this->EquipmentsModel->addequipment($createarray)) {
                        session()->setFlashdata('success', 'Success! registration completed.');
                        return view('Equipment/createsuccess');
                    } else {
                        session()->setFlashdata('failed', 'failed! registration failed.');
                        return view('Equipment/createsuccess');
                    }
                }
            }
        } catch (\Exception $e) {
            log_message("error", ' coursecontroler funtron addcourse ' . $e->getMessage());
        }
    }
    public function editEquipment($id)
    {
        try {
            helper(['form', 'url']);
            $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
            $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
            $data["dataequipment"] = $this->EquipmentsModel->getdata($id);
            $data["id"] = $id;
            return view('Equipment/editequipment', $data);
        } catch (\Exception $e) {
            log_message("error", ' Equipmentcontroler funtron editEquipment ' . $e->getMessage());
        }
    }
    public function updateequipment($id)
    {
        try {
            helper(['form', 'url']);


            $inputs = $this->validate([
                'Employeeid' => [
                    'label' => 'Employeeid',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  course Employeeid.',

                    ]
                ],
                'Name' => [
                    'label' => 'Name',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  Equipment  name.',

                    ]
                ],
                'Equipmenttype' => [
                    'label' => 'Equipmenttype',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  Equipment type.',

                    ]
                ],

                'manufacture' => [
                    'label' => 'manufacture',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  manufacture.',

                    ]
                ],
                'purchasedate' => [
                    'label' => 'purchasedate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  purchase date.',

                    ]
                ],
                'warrantyperiod' => [
                    'label' => 'warrantyperiod',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  warranty period.',

                    ]
                ],
                'series' => [
                    'label' => 'series',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter  series .',

                    ]
                ]
            ]);


            if (!$inputs) {
                $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
            $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
            $data["dataequipment"] = $this->EquipmentsModel->getdata($id);
            $data["id"] = $id;
            return view('Equipment/editequipment', $data,[
                'validation' => $this->validator
            ]);
                
            } else {
                $model = $this->CourseDetailsModel;

                $objDateTime = Time::now();

                $filename = $_FILES['Image']['name'];
                $base64 = '';
                if ($filename != '') {
                    /* Location */
                    $location = "../public/fileupload" . '/' . $filename;
                    $extension = pathinfo($location, PATHINFO_EXTENSION);
                    if ($extension != '') {
                        move_uploaded_file($_FILES['Image']['tmp_name'], $location);
                        $imagedata = file_get_contents($location);
                        // alternatively specify an URL, if PHP settings allow
                        $base64 = base64_encode($imagedata);
                        unlink($location);
                    }
                }
                $profileid = $this->CourseDetailsModel->getprofileid($this->request->getVar('Employeeid'));
                if ($profileid == null) {
                    session()->setFlashdata('failed', 'nhân viên không tồn tại');

                    $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
                    $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
                    $data["dataequipment"] = $this->EquipmentsModel->getdata($id);
                    $data["id"] = $id;
                    return view('Equipment/editequipment', $data, [
                        'validation' => $this->validator
                    ]);
                } else {
                    if($base64 == ''){
                        $createarray = array(
                            'equipment_id' => $this->request->getVar('equipmentid'),
                            'profile_id'  => (int) $profileid->id,
                            'type_id'  => $this->request->getVar('Equipmenttype'),
                            'name'  => $this->request->getVar('Name'),
                            'manufacture_id'  => $this->request->getVar('manufacture'),
                            'purchase_date'  => $this->request->getVar('purchasedate'),
                            'warranty_period'  => $this->request->getVar('warrantyperiod'),
                            'series' =>  $this->request->getVar('series'),
                            'position' =>  $this->request->getVar('position'),
                            'note' =>  $this->request->getVar('Note'),
                           
                        );
                    }
                    else {
                        $createarray = array(
                            'equipment_id' => $this->request->getVar('equipmentid'),
                            'profile_id'  => (int) $profileid->id,
                            'type_id'  => $this->request->getVar('Equipmenttype'),
                            'name'  => $this->request->getVar('Name'),
                            'manufacture_id'  => $this->request->getVar('manufacture'),
                            'purchase_date'  => $this->request->getVar('purchasedate'),
                            'warranty_period'  => $this->request->getVar('warrantyperiod'),
                            'series' =>  $this->request->getVar('series'),
                            'position' =>  $this->request->getVar('position'),
                            'note' =>  $this->request->getVar('Note'),
                            'img' =>  $base64,
                            
                        );
                    }

                    
                    if ($this->EquipmentsModel->updateequipment($createarray, $id)==1) {
                        session()->setFlashdata('success', 'Success! edit completed.');
                        $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
                        $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
                        return view('Equipment/index', $data);
                    } else {
                        session()->setFlashdata('failed', 'failed! edit failed.');
                        $data['typeequipment'] = $this->EquipmentsModel->gettypeequipment();
                        $data['Manufacture'] = $this->EquipmentsModel->getmanufacture();
                        return view('Equipment/index', $data);
                    }
                }
            }
        } catch (\Exception $e) {
            log_message("error", ' coursecontroler funtron addcourse ' . $e->getMessage());
        }
    }
    public function deleteequipment($id)
    {
        try {
        helper(['form', 'url']);
        $update = array(
            'del_flag' => 1
        );
        $this->EquipmentsModel->updateequipment($update, $id);
        session()->setFlashdata('success', 'xóa thành công');;
        
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron deletecourse '.$e->getMessage());
    }

    }

    public function getemployee(){
        
        $s= $this->EquipmentsModel->getdataemployee(trim($_GET['key']));
       
        return json_encode($s);


    }
}
