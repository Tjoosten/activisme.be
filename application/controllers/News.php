<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class News
 */
class News extends MY_Controller
{
    public $user        = []; /** @var array $user       The authencated user information. */
    public $abilities   = []; /** @var array $abilities  The authencated user abilities. */
    public $permissions = []; /** @var array $permissions  The authencated user permissions. */

    /**
     * News constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'session', 'blade']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->abilities   = $this->session->userdata('abilities');
        $this->permissions = $this->session->userdata('permissions');
    }

    /**
     * Create view for a new news item.
     *
     * @return Blade view.
     */
    public function create()
    {
        $data['title'] = 'Nieuw nieuwsbericht';

        return $this->blade->render('news/backend-create', $data);
    }

    /**
     * Update view for a news article.
     *
     * @see:url()
     * @return Blade view.
     */
    public function edit()
    {
       $newsId = $this->security->xss_clean($this->uri->segment(3));

       $data['news']  = Article::find($newsId);
       $data['title'] = $data['news']->title;

       return $this->blade->render('news/backend-edit', $data);
    }

    /**
     * Update to the database method.
     *
     * @see:url('GET|HEAD', 'http://www.activisme.be/newsupdate')
     * @return Response|Redirect
     */
    public function update()
    {
        $this->form_validation->set_rules('title', 'Titel', 'trim|required');
        $this->form_validation->set_rules('message', 'Bericht', 'trim|required');

        $newsId        = $this->security->xss_clean($this->uri->segment(3));
        $data['news']  = Article::find($newsId);

        if ($this->form_validation->run() === false) { // Validation >>> error
            $data['title'] = $data['news']->title;

            return $this->blade->render('news/backend-edit', $data);
        }

        // No errors found so move on with the logic.
        $input['title']   = $this->server->post('title');
        $input['message'] = $this->server->post('message');

        if ($data['news']->update($this->security->xss_clean($input))) { // News >>> Updated
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Het artikel is aangepast.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Store a new news item into the database.
     *
     * @see:url('GET|HEAD')
     * @return Response|Redirect
     */
    public function store()
    {
        $this->form_validation->set_rules('title', 'Titel', 'trim|required');
        $this->form_validation->set_rules('message', 'Bericht', 'trim|required');

        if ($this->form_validation->run() === false) { // Validation >>> fails
            $data['title'] = 'Nieuws berichten';
            $data['news']  = Article::with(['author'])->get();

            return $this->blade->render('news/backend_news', $data);
        }

        // No validation errors found. Move on with out logic.
        $input['title']   = $this->input->post('class');
        $input['message'] = $this->input->post('message');

        if (Article::create($this->security->xss_clean($input))) { // Record >>> created.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Het nieuwsbericht is aangemaakt.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Delete a news article.
     *
     * @see:url('DELETE', 'http://www.activisme.be/news/destroy/{id}')
     * @return Response|Redirect
     */
    public function destroy()
    {
        $articleId = $this->uri->segment(3);

        if (Article::find($this->security->xss_clean($articleId))) { // Record >>> Deleted.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Het nieuws item is verwijderd.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
