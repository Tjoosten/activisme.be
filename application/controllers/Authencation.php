<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Authencation
 */
class Authencation extends MY_Controller
{
    public $user        = []; /** @var array $user         The information about the authencated user. */
    public $abilities   = []; /** @var array $abilities    The abilities for the authencated user.     */
    public $permissions = []; /** @var array $permissions  The permissions for the authencated user.   */

    /**
     * Authencation constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['session', 'blade', 'form_validation']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->abilities   = $this->session->userdata('abilities');
        $this->permissions = $this->session->userdata('permissions');
    }

    /**
     * Return the list of middlewares you want to be applied,
     * Here is list of some valid options
     *
     * admin_auth                    // As used below, simplest, will be applied to all
     * someother|except:index,list   // This will be only applied to posts()
     * yet_another_one|only:index    // This will be only applied to index()
     *
     * @return array
     */
    protected function middleware()
    {
        return [];
    }

    /**
     * Get the login view.
     *
     * @url:see()
     * @return
     */
    public function index()
    {
        $data['title'] = 'Login';
        return $this->blade->render('auth/login', $data);
    }

    /**
     * Verify the given user against the database.
     *
     * @see:url()
     * @return
     */
    public function verify()
    {
        //
    }

    /**
     * [INTERNAL]: Check the given credentials against the database.
     *
     * @return bool
     */
    public function check_database()
    {
        //
    }

    /**
     * @see:url()
     * @return
     */
    public function register()
    {
        $data['title'] = 'Registreer je account.';
        return $this->blade->render('', $data);
    }

    /**
     * Store the given user information in the database.
     *
     * @see:url('POST', 'http://www.activisme.be/authencation/store')
     * @return Response|Redirect
     */
    public function store()
    {
        $this->form_validation->set_rules();
        $this->form_validation->set_rules();
        $this->form_validation->set_rules();

        if ($this->form_validation->run() === false) { // Validation >>> fails
            $data['title'] = 'Login';

            return $this->blade->render('', $data);
        }

        if (Authencate::store($this->security->xss_clean($input))) {
            $this->session->set_flashdata('class', 'alert-success');
            $this->session->set_flashdata('message', 'Uw account is successvol aangemaakt.');
        }

        return redirect(base_url('/'));
    }
}
