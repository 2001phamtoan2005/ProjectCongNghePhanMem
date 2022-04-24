<?php

namespace App\Controllers;

use App\Models\ProfilesModel;
use CodeIgniter\I18n\Time;
use \Hermawan\DataTables\DataTable;
use CodeIgniter\Controller;
class Profile extends BaseController
{

    public function index()
    {
        helper(['form', 'url']);
        $department = $this->DepartmentsModel->getAll();
        $position = $this->PositionsModel->getAll();
        $input = $this->request->getVar();
        $data = [
            "input" => $input,
            "department" => $department,
            "position" => $position
        ];
        // echo(json_encode($data));
        // exit;
        return view('User/index', $data);
    }
    public function userList()
    {
        $json_data = $this->ProfilesModel->userlist();
        echo json_encode($json_data);
    }
    public function searchUser()
    {
        $id = $this->request->getVar('id');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $status = $this->request->getVar('status');
        $draw = $this->request->getVar('draw');
        $start = $this->request->getVar('start');
        $length = $this->request->getVar('length');
        $department_id = $this->request->getVar('department_id');
        $position_id = $this->request->getVar('position_id');
        $order = [];
        $orders = $this->request->getVar("order");
        if ($orders != null) {
            $columns = $this->request->getVar("columns");
            foreach ($orders as $value) {
                $id_col = $value["column"];
                $field = $columns[$id_col]["data"];
                $val = ($value["dir"] == "asc") ? true : false;
                $order[$field] = $val;
            }
        }
        $input = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'status' => $status,
            'draw'  => $draw,
            'start' => $start,
            'length'  => $length,
            'department_id'  => $department_id,
            'position_id'  => $position_id,
            'orders'  => $order
        ];

        $json_data = $this->ProfilesModel->searchAJAX($input);

        echo json_encode($json_data);
    }

    public function createUser()
    {
        helper(['form', 'url']);
        $department = $this->DepartmentsModel->getAll();
        $position = $this->PositionsModel->getAll();
        $input = $this->request->getVar();
        $data = [
            "input" => $input,
            "department" => $department,
            "position" => $position
        ];
        return view('User/create', $data);
    }
    public function addUser()
    {
        helper(['form', 'url']);
        $department = $this->DepartmentsModel->getAll();
        $position = $this->PositionsModel->getAll();
        $input = $this->request->getVar();
        $data = [
            "department" => $department,
            "position" => $position
        ];

        $inputs = $this->validate([
            'login_id' => [
                'label' => 'login_id',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],

            'repass' => [
                'label' => 'repass',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'fullname' => [
                'label' => 'fullname',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',
                ]
            ],
            'email_create' => [
                'label' => 'email_create',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'employee_id_create' => [
                'label' => 'employee_id_create',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],

            'department_id' => [
                'label' => 'department_id',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'position_id' => [
                'label' => 'position_id',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'moblie' => [
                'label' => 'moblie',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',
                ]
            ],
            'probation_date' => [
                'label' => 'probation_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'officeial_date' => [
                'label' => 'officeial_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',
                ]
            ]
        ]);
        if (!$inputs) {
            return view('User/create', $data, [
                'validation' => $this->validator
            ]);
        } else {
            $login_id = $this->request->getVar('login_id');
            $password = $this->request->getVar('password');
            $fullname = $this->request->getVar('fullname');
            $radio_create_user = $this->request->getVar('radio_create_user');
            $create_status = $this->request->getVar('create_status');
            $birthday = $this->request->getVar('birthday');
            $email_create = $this->request->getVar('email_create');
            $employee_id_create = $this->request->getVar('employee_id_create');
            $department_id = $this->request->getVar('department_id');
            $position_id = $this->request->getVar('position_id');
            $telephone = $this->request->getVar('telephone');
            $moblie = $this->request->getVar('moblie');
            $probation_date = $this->request->getVar('probation_date');
            $officeial_date = $this->request->getVar('officeial_date');
            $address = $this->request->getVar('address');

            $input = [
                'name' => $fullname,
                'gender' => $radio_create_user,
                'status' => $create_status,
                'birthday' => $birthday,
                'email'  => $email_create,
                'employee_id' => $employee_id_create,
                'telephone'  => $telephone,
                'department_id'  => $department_id,
                'position_id'  => $position_id,
                'mobile'  => $moblie,
                'probation_date'  => $probation_date,
                'official_date'  => $officeial_date,
                'address'  => $address,
                'image' => null,
                'del_flag' => 0,
                'updated_time' => null,
                'updated_user' => null,
                'created_time' => null,
                'created_user' => null
            ];
            $user = [
                'login_id' => $login_id,
                'password' => $password,
            ];
            $total = [
                'input' => $input,
                'user' => $user
            ];
            log_message('error',$input['email']);
            $this->sendmail($input['email'], 'Mật Khẩu', '<div style="background-color:#f6f6f6;font-family:arial,sans-serif;color:#474747;padding:2%" bgcolor="#f6f6f6">
            <table style="width:100%;max-width:680px;margin:0px auto;background:white;font-size:14px;line-height:1.5" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <h4> Cảm ơn bạn đã đăng ký tham gia</h4>
                    <h4 style="color:#222222;font-weight:bold;font-size:24px;margin:10px 0 16px 0">Mật khẩu là :</h4>
                    <p style="background:#eeeeee;padding:10px;border-radius:2px;color:#000000;font-size:18px;font-weight:bold">' . $user['password'] . '</p>  
                    <p style="font-size:11px;color:#959595" align="left">Copyright ©  2022</p>
                <p></p></td>
              </tr>
            </tbody></table><div class="yj6qo"></div><div class="adL">
            </div></div>');
            if ($this->ProfilesModel->create($input, $user)) {
                session()->setFlashdata('success', 'Success! registration completed.');
                return view('User/success', $total);
            } else {
                session()->setFlashdata('failed', 'Failed! Registration Failed.');
                return view('User/create', $data);
            }
        }
    }
    public function updateUser($id = null)
    {
        helper(['form', 'url']);
        $profile = new ProfilesModel();
        $department = $this->DepartmentsModel->getAll();
        $position = $this->PositionsModel->getAll();
        $input = $this->ProfilesModel->getDataByID($id);
        $profile = $this->ProfilesModel->getDataByID($id);    
        var_dump($profile);
        $data = [
            "input" => $input,
            "department" => $department,
            "position" => $position,
            'profile' => $profile
        ];
        return view('User/edituser', $data);
    }
    public function editUser($id = null)
    {
        helper(['form', 'url']);
        $department = $this->DepartmentsModel->getAll();
        $position = $this->PositionsModel->getAll();
        $data = [
            'department' => $department,
            'position'  => $position
        ];
        $inputs = $this->validate([
            'fullname' => [
                'label' => 'fullname',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',
                ]
            ],
            'email_create' => [
                'label' => 'email_create',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'employee_id' => [
                'label' => 'employee_id',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],

            'department' => [
                'label' => 'department',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'position' => [
                'label' => 'position',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'mobile' => [
                'label' => 'moblie',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',
                ]
            ],
            'probation_date' => [
                'label' => 'probation_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',

                ]
            ],
            'officeial_date' => [
                'label' => 'officeial_date',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter value.',
                ]
            ]
        ]);
        if (!$inputs) {
            return view('User/edituser', $data, [
                'validation' => $this->validator
            ]);
        } else {
            $login_id = $this->request->getVar('login_id');
            $password = $this->request->getVar('password');
            $fullname = $this->request->getVar('fullname');
            $radio_create_user = $this->request->getVar('gender');
            $create_status = $this->request->getVar('status');
            $birthday = $this->request->getVar('birthday');
            $email_create = $this->request->getVar('email_create');
            $employee_id = $this->request->getVar('employee_id');
            $department_id = $this->request->getVar('department');
            $position_id = $this->request->getVar('position');
            $telephone = $this->request->getVar('telephone');
            $moblie = $this->request->getVar('mobile');
            $probation_date = $this->request->getVar('probation_date');
            $officeial_date = $this->request->getVar('officeial_date');
            $address = $this->request->getVar('address');
            $objDateTime = Time::now();
            $input = [
                'name' => $fullname,
                'gender' => $radio_create_user,
                'status' => $create_status,
                'birthday' => $birthday,
                'email'  => $email_create,
                'employee_id' => $employee_id,
                'telephone'  => $telephone,
                'department_id'  => $department_id,
                'position_id'  => $position_id,
                'mobile'  => $moblie,
                'probation_date'  => $probation_date,
                'official_date'  => $officeial_date,
                'address'  => $address,
                'del_flag' => 0,
                'updated_time' => $objDateTime->toDateTimeString(),
                'updated_user' => null,
                'created_time' => null,
                'created_user' => null
            ];
            var_dump($id);
            var_dump($input);
            var_dump(app_timezone());
            $user = [
                'login_id' => $login_id,
            ];
            $total = [ 
                "department" => $department,
                "position" => $position,
                'input' => $input,
                'user' => $user
            ];
            if ($this->ProfilesModel->updateById($id,$input)) {
                session()->setFlashdata('success', 'Success! update completed.');
                return redirect()->to('/userlist'); 
            } else {
                session()->setFlashdata('failed', 'Failed! Registration Failed.');
                return view('User/success', $total);
            }
        }
    }
    public function deletecourse($id = null)
    {
        helper(['form', 'url']);
        $this->ProfilesModel->deleteById($id);
        session()->setFlashdata('success', 'xóa thành công');;
        return view('User/index');
    }
}