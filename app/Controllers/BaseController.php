<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\ProjectModel;
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
abstract class BaseController extends Controller
{

    protected $trendingProjects = [];
    protected $currentUser = [];
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
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = service('session');

        // Load helpers if needed
        helper(['url', 'form']);

        // Load trending projects
        $projectModel = new ProjectModel();
        // Fetch latest 5 trending projects
        $this->trendingProjects = $projectModel
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        // Load current user from session
        $sessionUser = session()->get('user');

        if ($sessionUser && isset($sessionUser['id'])) {
            $userModel = new UserModel();
            $this->currentUser = $userModel->find($sessionUser['id']);
        }
    }

    protected function renderView($view, $data = [])
    {
        $data['trendingProjects'] = $this->trendingProjects;
        $data['user'] = $this->currentUser;
        $data = array_merge($data, $this->loadSharedData());

        //dd($data);

        echo view('layouts/header', $data);
        echo view($view, $data);
        echo view('layouts/sidebar', $data);
        echo view('layouts/footer', $data);
    }
    protected function loadSharedData()
    {
        $projectModel = new \App\Models\ProjectModel();
        $projects = $projectModel->findAll();
        return ['projects' => $projects];
    }

}
