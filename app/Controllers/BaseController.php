<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\ContractTypeModel;
use App\Models\CourseDetailsModel;
use App\Models\CourseModel;
use App\Models\DepartmentsModel;
use App\Models\EquipmentsModel;
use App\Models\LeaveDetailsModel;
use App\Models\LeaveReasonModel;
use App\Models\LeaveTypeModel;
use App\Models\ManufacturerModel;
use App\Models\PositionsModel;
use App\Models\ProfilesModel;
use App\Models\ProjectMembersModel;
use App\Models\ProjectsModel;
use App\Models\TypeEquimentsModel;
use App\Models\UserModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];
    protected $ContractTypeModel ;
    protected  $CourseDetailsModel ;
    protected $CourseModel ;
    protected $DepartmentsModel ;
    protected $EquipmentsModel ;
    protected $LeaveDetailsModel ;
    protected $LeaveTypeModel ;
    protected $LeaveReasonModel;
    protected $ManufacturerModel ;
    protected $PositionsModel ;
    protected $ProfilesModel ;
    protected $ProjectMembersModel ;
    protected $ProjectsModel ;
    protected $TypeEquimentsModel;
    protected $UserModel;
    protected $db;
    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.


        $this->db=db_connect();
         $this->ContractTypeModel = model('app\Models\ContractTypeModel', false);
        $this->CourseDetailsModel = model('app\Models\CourseDetailsModel', false) ;
        $this->CourseModel = model('app\Models\CourseModel', false) ;
        $this->DepartmentsModel =model('app\Models\DepartmentsModel', false) ;
        $this->EquipmentsModel =model('app\Models\EquipmentsModel', false);
        $this->LeaveDetailsModel =model('app\Models\LeaveDetailsModel', false);
        $this->LeaveTypeModel =model('app\Models\LeaveTypeModel', false) ;
        $this->LeaveReasonModel =model('app\Models\LeaveReasonModel', false);
        $this->ManufacturerModel =model('app\Models\ManufacturerModel', false);
        $this->PositionsModel =model('app\Models\PositionsModel', false);
        $this->ProfilesModel =model('app\Models\ProfilesModel', false);
        $this->ProjectMembersModel =model('app\Models\ProjectMembersModel', false);
        $this->ProjectsModel =model('app\Models\ProjectsModel', false);
        $this->TypeEquimentsModel =model('app\Models\TypeEquimentsModel', false) ;
        $this->UserModel =model('app\Models\UserModel', false) ;
        
        // E.g.: $this->session = \Config\Services::session();

        $session = \Config\Services::session();
      $language = \Config\Services::language();
      $language->setLocale($session->lang);
      // $session->set('lang',"EN");
    }
    public function sendmail($to,$subject,$message){
      $email= \Config\Services::email();
      $email->setTo($to);
      $email->setFrom('dvdai26032000@gmail.com','Info');
    //   $email->setBCC('dvdai26032000@gmail.com');
    //  $email->setCC('anhlathanhnhan@gmail.com');
      $email->setSubject($subject);
      $email->setMessage($message);
      //$email->attach('public/asset/image_login/background_rungthong.jpg');

       if($email->send()){
         log_message('error','Thanhcong');
        return "thanh công";
       }
       else {
        log_message('error','Faile');
         $data=$email->printDebugger('body');
         return $data;
        }
    }
    
}
