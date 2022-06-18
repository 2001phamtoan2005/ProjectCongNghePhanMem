<?php

namespace App\Controllers;
use App\Models\UserModel;
use PHPUnit\Util\Xml\Validator;

class Login extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        return view('Login/login');
    }
    //xu li su kien khi dang nhap
    public function login()
	{	 helper(['form', 'url']);
        $validation =  \Config\Services::validation();
        if(isset($session['msg']))//kiem tra session msg
            session_destroy();//huy session msg
        $session = session();
        $username = $this->request->getVar('username');//lay usn
        $password = $this->request->getVar('password');//lay pwd
        if(!$validation->check($username, 'required'))//check validation username ko dc de trong
        {
            $session->setFlashdata('msg', 'Please enter your username');//xuat thong bao
                // return view('Login/login');
                return redirect()->to('/loginpage'); 
        }
        
        else if(!$validation->check($password, 'required'))//check validation password ko dc de trong
        {
            $session->setFlashdata('msg', 'Please enter your password');//xuat thong bao
                // return view('Login/login');
                return redirect()->to('/loginpage'); 
        }
        else
        {
            $userModel = new UserModel();
            $data = $userModel->where('login_id', $username)->first();
            if($data){
                $pass =  $data['password'];
            
                if($password==$data['password']){
                    
                    $user_data = [
                        'id' => $data['id'],
                        'login_id' => $data['login_id'],
                        'profile_id' => $data['profile_id'],
                        'isLoggedIn' => TRUE,
                        'name'=>$this->ProfilesModel->getUser($data['profile_id'])[0]['name'],
                    ];
                    
                    $user=$this->ProfilesModel->getUser($data['profile_id']);
                    // echo json_encode($user[0]);
                    // exit;
                    $session->set('users',$user_data);    
                    return redirect()->to('home');               
                    //return view('Homes/home');
                    //echo "Login success!";
                
                }else{
                    $session->setFlashdata('msg', 'Password is incorrect.');
                    // return view('login');
                    return redirect()->to('/loginpage');  
                }

            }else{
                $session->setFlashdata('msg', 'Username does not exist.');
                // return view('Login/login');
                return redirect()->to('/loginpage'); 
            }
        }
        
    }
    //xu li khi dang xuat
    public function logout()
    {
        $session=session();
        $session->destroy();
        return view('Login/login');
    }
}