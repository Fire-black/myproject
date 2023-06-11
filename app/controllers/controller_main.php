<?php
class controller_main extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(empty($_SESSION['user'])){
            header('Location: /user/login');
        }
        $this->model = new Model_main();
    }

    function index()
    {
        $data['users'] = $this->get_users();
        $data['posts'] = $this->model->get_posts();
        $this->view->generate('main_view.php', $data);
    }

    public function createpost(){
        if(isset($_POST['caption'], $_POST['post'])){
            $this->model->create_post(htmlentities($_POST['caption']), htmlentities($_POST['post']));
        }
        header('Location: /');
    }

    public function post($id)
    {
        if(!$id) Route::ErrorPage404();
        $data['post'] = $this->model->get_post($id);
        if(!$data['post']) Route::ErrorPage404();
        $data['users'] = $this->get_users();
        $data['comments'] = $this->model->get_comments($id);
        $this->view->generate('post.php', $data);
    }

    public function add_comment($post_id)
    {
        if(isset($_POST['comment'])){
            $user_id = $_SESSION['user']['id'];
            $this->model->add_comment($post_id, $user_id, htmlentities($_POST['comment']));
        }
        header('Location: /main/post/' . $post_id);
    }

    private function get_users(): array
    {
        include 'app/models/model_user.php';
        $users_model = new Model_user();
        $users = $users_model->get_users();
        $ret = [];
        foreach ($users as $u)
            $ret[$u['id']] = $u['login'];
        return $ret;
    }
}