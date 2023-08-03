<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\LogsModel;

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
abstract class BaseController extends Controller
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

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }


    /**
     * Password Encryption
     * @param $string
     * @return string hash
     * @uses login, create user
    */
    public function hash($string){
        return hash('sha512', $string . config_item('encryption_key'));
    }


    /**
     * check isloggedin variable to bool
     * */
    public function logOut(){
        $session = session();
        $session->set('isLoggedIn', 'loggedout');
        $session->session_destroy();
        return redirect()->to(base_url('/'));
    }


    public function checkAuthLogin(){

        $session = session();

        return $session->has('isLoggedIn');

    }

    public function z_logs($user_id, $activity){

        $z_logs = new LogsModel();
        $datetime = date('Y-m-d h:i:s A');
        $ip = $_SERVER['REMOTE_ADDR'];
        $mac = exec('getmac');

        $log_time = $datetime . "|" . $ip ."|" . $mac;

        $data = array(
            'user_id' => $user_id,
            'activity' => $activity,
            'log_time' => $log_time
        );

        $z_logs->save($data);

    }

    public function options($any){
         return $this->response->setHeader('Access-Control-Allow-Origin', '*') //for allow any domain, insecure
            ->setHeader('Access-Control-Allow-Headers', '*') //for allow any headers, insecure
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE') //method allowed
            ->setStatusCode(200); //status code
    }
}
