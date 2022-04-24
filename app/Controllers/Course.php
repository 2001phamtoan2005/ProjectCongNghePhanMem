<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use \Hermawan\DataTables\DataTable;
use PhpParser\Node\Stmt\Catch_;
use App\Models\CourseModel;

class Course extends BaseController
{

    public function index()
    {
        try {
        helper(['form', 'url']);
        $model=new CourseModel();
        $data['type']=$model->getType();
        // echo(json_encode($data));
        // exit;
        return view('Course/index',$data);
        }
        catch (\Exception $e) {
            log_message("error", ' coursecontroler funtron indexcourse '. $e->getMessage());
        }
    }
   
    public function searchcourse()
    {

        try {
        $name = trim($_GET['name']);
        $Startfrom = trim($_GET['Startfrom']);
        $Endfrom = trim($_GET['Endfrom']);
        $Coursetype = trim($_GET['Coursetype']);
        $Startto = trim($_GET['Startto']);
        $Endto = trim($_GET['Endto']);
        $Weekdays = trim($_GET['Weekdays']);
        $Time = trim($_GET['Time']);
        $json_data = $this->CourseModel->searchcourse($name, $Startfrom, $Endfrom, $Coursetype, $Startto, $Endto, $Weekdays, $Time);

        echo json_encode($json_data);
    }
        catch (\Exception $e) {
            log_message("error",  'searchcourse '. $e->getMessage());
        }
    }
    public function createcourse()
    {
        try {
        helper(['form', 'url']);
        return view('Course/Createcourse');
        
    }
    catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron createcourse '.$e->getMessage());
    }
    }

    public function addcourse()
    {
        try {
        helper(['form', 'url']);

        if ($this->request->getVar('createcoursetype') == "Sự kiện") {
            $inputs = $this->validate([
                'createname' => [
                    'label' => 'createname',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course name.',

                    ]
                ],
                'createcoursetype' => [
                    'label' => 'createcoursetype',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course type.',

                    ]
                ],

                'createstartdate' => [
                    'label' => 'createstartdate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course start date.',

                    ]
                ],
                'createenddate' => [
                    'label' => 'createenddate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course end date.',

                    ]
                ]
            ]);
        } else {
            $inputs = $this->validate([
                'createname' => [
                    'label' => 'createname',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course name.',

                    ]
                ],
                'createcoursetype' => [
                    'label' => 'createcoursetype',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course type.',

                    ]
                ],
                'createtime' => [
                    'label' => 'createtime',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course time.',

                    ]
                ],
                'createweekdays' => [
                    'label' => 'createweekdays',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course weekdays.',

                    ]
                ],
                'createstartdate' => [
                    'label' => 'createstartdate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course start date.',

                    ]
                ],
                'createenddate' => [
                    'label' => 'createenddate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course end date.',
                    ]
                ]
            ]);
        }

        if (!$inputs) {
            return view('Course/Createcourse', [
                'validation' => $this->validator
            ]);
        } else {
            $model = $this->CourseDetailsModel;

            $objDateTime = Time::now();

            $createarray = array(
                'name' => $this->request->getVar('createname'),
                'course_type'  => $this->request->getVar('createcoursetype'),
                'time'  => $this->request->getVar('createtime'),
                'weekdays'  => $this->request->getVar('createweekdays'),
                'start_date'  => $this->request->getVar('createstartdate'),
                'end_date'  => $this->request->getVar('createenddate'),
                'note'  => $this->request->getVar('createnote'),
                'del_flag' => 0,
                'created_time' => $objDateTime->toDateTimeString(),
                'created_user' => null
            );
            if ($this->CourseModel->addcourse($createarray)) {
                session()->setFlashdata('success', 'Success! registration completed.');
                return view('Course/createsuccess');
            } else {
                session()->setFlashdata('failed', 'failed! registration failed.');
                return view('Course/Createcourse');
            }
        }
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron addcourse '.$e->getMessage());
    }

    }

    public function editcourse($id)
    {
        try {
        helper(['form', 'url']);

        $data["datacourse"] = $this->CourseModel->getdata($id);
        $data["id"] = $id;
        return view('Course/Editcourse', $data);
        
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron editcourse '.$e->getMessage());
    }
        
    }
    public function updatecourse($id)
    {
        try {
        helper(['form', 'url']);
        if ($this->request->getVar('editcoursetype') == "Sự kiện") {
            $inputs = $this->validate([
                'editname' => [
                    'label' => 'editname',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course name.',

                    ]
                ],
                'editcoursetype' => [
                    'label' => 'editcoursetype',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course type.',

                    ]
                ],
                'editstartdate' => [
                    'label' => 'editstartdate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course start date.',

                    ]
                ],
                'editenddate' => [
                    'label' => 'editenddate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course end date.',
                    ]
                ]
            ]);
        } else {
            $inputs = $this->validate([
                'editname' => [
                    'label' => 'editname',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course name.',

                    ]
                ],
                'editcoursetype' => [
                    'label' => 'editcoursetype',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course type.',

                    ]
                ],
                'edittime' => [
                    'label' => 'edittime',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course time.',

                    ]
                ],
                'editweekdays' => [
                    'label' => 'editweekdays',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course weekdays.',

                    ]
                ],
                'editstartdate' => [
                    'label' => 'editstartdate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course start date.',

                    ]
                ],
                'editenddate' => [
                    'label' => 'editenddate',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please enter your course end date.',
                    ]
                ]
            ]);
        }

        if (!$inputs) {

            $objDateTime = Time::now();
            $createarray = array(
                [
                    'name' => $this->request->getVar('editname'),
                    'course_type'  => $this->request->getVar('editcoursetype'),
                    'time'  => $this->request->getVar('edittime'),
                    'weekdays'  => $this->request->getVar('editweekdays'),
                    'start_date'  => $this->request->getVar('editstartdate'),
                    'end_date'  => $this->request->getVar('editenddate'),
                    'note'  => $this->request->getVar('editnote')
                ]
            );
            $object = json_decode(json_encode($createarray));
            $data["datacourse"] = $object;
            $data["id"] = $id;
            return view('Course/Editcourse', $data, [
                'validation' => $this->validator
            ]);
        } else {
            $objDateTime = Time::now();
            $createarray = array(
                'name' => $this->request->getVar('editname'),
                'course_type'  => $this->request->getVar('editcoursetype'),
                'time'  => $this->request->getVar('edittime'),
                'weekdays'  => $this->request->getVar('editweekdays'),
                'start_date'  => $this->request->getVar('editstartdate'),
                'end_date'  => $this->request->getVar('editenddate'),
                'note'  => $this->request->getVar('editnote'),
                'del_flag' => 0,
                'updated_time' => $objDateTime->toDateTimeString(),
                'updated_user' => null
            );
            $erroradd = array(
                'name' => $this->request->getVar('editname'),
                'course_type'  => $this->request->getVar('editcoursetype'),
                'time'  => $this->request->getVar('edittime'),
                'weekdays'  => $this->request->getVar('editweekdays'),
                'start_date'  => $this->request->getVar('editstartdate'),
                'end_date'  => $this->request->getVar('editenddate'),
                'note'  => $this->request->getVar('editnote'));

            if ($this->CourseModel->updatecurse($createarray, $id)==1) {
                session()->setFlashdata('success', 'Success! edit completed.');
               
            } else {
                session()->setFlashdata('failed', 'failed! edit failed.'.implode( ' , ',$erroradd));
            }
            $data["id"] = $id;
            $data["datacourse"] = $this->CourseModel->getdata($id);
            return view('Course/Editcourse', $data);
        }
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron updatecourse '.$e->getMessage());
    }
    }
    public function deletecourse($id)
    {
        try {
        helper(['form', 'url']);
        $update = array(
            'del_flag' => 1
        );
        $this->CourseModel->updatecurse($update, $id);
        session()->setFlashdata('success', 'xóa thành công');;
        return view('Course/index');
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron deletecourse '.$e->getMessage());
    }

    }
    public function paticipant($id)
    { try {
        $data["id"] = $id;
        return view('Course/paticipant', $data);
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron paticipant '.$e->getMessage());
    }

    }
    public function paticipantlist($id)
    {
        try {
        $json_data = $this->CourseDetailsModel->paticipantlist((int)str_replace('id=', '', $id));

        echo json_encode($json_data);
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron paticipantlist '.$e->getMessage());
    }
    }
    public function deletepaticipant($id)
    {
        try {
        $update = array(
            'del_flag' => 1
        );

        return  $this->CourseDetailsModel->updatecursedetail($update, $id);
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron deletepaticipant '.$e->getMessage());
    }
    }

    public function addpaticipant($id)
    {
        try {
        $Course = $this->CourseModel->getdata($id);
        $profileid = $this->CourseDetailsModel->getprofileid(trim($_GET['employeeid']));
        if ($profileid == null) {
            session()->setFlashdata('failed', 'nhân viên không tồn tại');
        } else {


            $createarray = array(
                'course_id' => (int)str_replace('id=', '', $id),
                'profile_id'  => (int) $profileid->id,
                'del_flag' => 0,
                'updated_time' => null,
                'updated_user' => null,
                'created_time' => null,
                'created_user' => null
            );

            $arraycheck = array( 
                'course_id' =>  (int)str_replace('id=', '', $id),
                'profile_id'  => (int) $profileid->id
            );
            $check = $this->CourseDetailsModel->checkcoursedetail($arraycheck);
            if (json_encode($check) == 0) {

                $this->sendmail($profileid->email, 'haugui', '<div style="background-color:#f6f6f6;font-family:arial,sans-serif;color:#474747;padding:2%" bgcolor="#f6f6f6">
            <table style="width:100%;max-width:680px;margin:0px auto;background:white;font-size:14px;line-height:1.5" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td style="padding:45px;padding-top:60px;padding-bottom:10px" align="left">
                        <h1 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">THÔNG BÁO THAM GIA KHÓA HỌC </h1>
                    </td>
                    <td align="right">
                    </td>
                </tr>
                <tr>
                    <td style="padding:45px" align="left" colspan="2">
                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">BẠN  ĐÃ ĐƯỢC THAM GIA VÀO KHÓA HỌC</h2>
                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Tên Nhân viên :</h4>
                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $profileid->name . '</p>
                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Tên khóa học :</h4>
                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->name . '</p>
                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Loại khóa học :</h4>
                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->course_type . '</p>
                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Thời gian :</h4>
                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->time . '</p>
                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Ngày bắt đầu :</h4>
                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->start_date . '</p>
                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Ngày kết thúc:</h4>
                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->end_date . '</p>
                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Note:</h4>
                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->note . '</p>
                                
                        
                        <p style="font-size:11px;color:#959595" align="left">Copyright ©  2022</p>
                <p></p></td>
              </tr>
            </tbody></table><div class="yj6qo"></div><div class="adL">
            </div></div>');

                $this->CourseDetailsModel->addcoursedetail($createarray);
                session()->setFlashdata('success', 'Thêm thành công');
            } else {
                session()->setFlashdata('failed', 'Bạn đã thêm nhân viên này rồi');
            }
        }
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron addpaticipant '.$e->getMessage());
    }
    }


    public function uploadfilexls($id)
    {
        try {
        $Course = $this->CourseModel->getdata($id);

        $filename = $_FILES['fileupload']['name'];

        /* Location */
        $location = "../public/fileupload" . '/' . $filename;
        $extension = pathinfo($location, PATHINFO_EXTENSION);
        if ($extension != '') {
            if (move_uploaded_file($_FILES['fileupload']['tmp_name'], $location)) {
            } else {
            }

            $extension = pathinfo($location, PATHINFO_EXTENSION);

            if ('csv' == $extension) {
                $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet     = $reader->load($location);
            $sheet_data     = $spreadsheet->getActiveSheet()->toArray();
            $sheetcount = count($sheet_data);
            
            if ($sheetcount > 6) {
                for ($i = 6; $i < $sheetcount; $i++) {
                    $profileid = $this->CourseDetailsModel->getprofileid($sheet_data[$i][0]);

                    if ($profileid != null) {


                        $arraycheck = array(
                            'course_id' =>  (int)str_replace('id=', '', $id),
                            'profile_id'  => (int) $profileid->id
                        );
                        $createarray = array(
                            'course_id' => (int)str_replace('id=', '', $id),
                            'profile_id'  => (int) $profileid->id,
                            'del_flag' => 0,
                            'updated_time' => null,
                            'updated_user' => null,
                            'created_time' => null,
                            'created_user' => null
                        );
                        $check = $this->CourseDetailsModel->checkcoursedetail($arraycheck);
                        if (json_encode($check) == 0) {
                            

                            $this->sendmail($profileid->email, 'haugui', '<div style="background-color:#f6f6f6;font-family:arial,sans-serif;color:#474747;padding:2%" bgcolor="#f6f6f6">
                            <table style="width:100%;max-width:680px;margin:0px auto;background:white;font-size:14px;line-height:1.5" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr>
                                    <td style="padding:45px;padding-top:60px;padding-bottom:10px" align="left">
                                        <h1 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">THÔNG BÁO THAM GIA KHÓA HỌC </h1>
                                    </td>
                                    <td align="right">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:45px" align="left" colspan="2">
                                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">BẠN  ĐÃ ĐƯỢC THAM GIA VÀO KHÓA HỌC</h2>
                                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Tên Nhân viên :</h4>
                                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $profileid->name . '</p>
                                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Tên khóa học :</h4>
                                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->name . '</p>
                                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Loại khóa học :</h4>
                                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->course_type . '</p>
                                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Thời gian :</h4>
                                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->time . '</p>
                                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Ngày bắt đầu :</h4>
                                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->start_date . '</p>
                                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Ngày kết thúc:</h4>
                                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->end_date . '</p>
                                        <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Note:</h4>
                                        <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $Course[0]->note . '</p>
                                                
                                        
                                        <p style="font-size:11px;color:#959595" align="left">Copyright ©  2022</p>
                                <p></p></td>
                              </tr>
                            </tbody></table><div class="yj6qo"></div><div class="adL">
                            </div></div>');

                            $this->CourseDetailsModel->addcoursedetail($createarray);
                           
                            
                        }
                    }
                }
                session()->setFlashdata('success', 'Thêm thành công');
            }
            
        }
        else {
            session()->setFlashdata('failed', 'Vui lòng chọn file upload');;
        }

        unlink($location);
       return  $this->paticipant($id);
    }catch (\Exception $e) {
        log_message("error", ' coursecontroler funtron uploadfilexls '.$e->getMessage());
    }
       
    }
}
