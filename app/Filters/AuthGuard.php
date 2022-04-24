<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AuthGuard implements FilterInterface
{
    //kiem tra da login chua, neu chua dua ve trang login
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn'))
        {
            //return view('Login/login');
            return redirect()->to('loginpage');
            //return redirect('/login');
            //return redirect()->to(site_url('/login'));
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}