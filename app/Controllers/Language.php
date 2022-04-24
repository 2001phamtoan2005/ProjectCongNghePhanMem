<?php

namespace App\Controllers;
use app\Models\CourseModels;
use CodeIgniter\API\ResponseTrait;
use \Hermawan\DataTables\DataTable;

class Language extends BaseController
{
    public function index()
    {
        $session = session();
        $locale = $this->request->getLocale();
        $session->remove('lang');
        $session->set('lang',strtoupper($locale));
        $url = base_url('homepage');
        //var_dump($locale);

       return redirect()->to($url);
    }
}

