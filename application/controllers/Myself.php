<?php
/**
 * Created by PhpStorm.
 * User: piekey1994
 * Date: 2016-06-01
 * Time: 16:40
 * 显示个人页面
 */
class Myself extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MatchingModel');
        $this->load->model('UserModel');
        $this->load->library('session');

    }

    public function index()
    {
        $id=$this->session->userid;
        $user=$this->UserModel->getById($id);
        $cards=$this->MatchingModel->getByUid($id);
        $friends=$this->UserModel->getFriends($id);
        $data=array(
            'user'=>$user,
            'cards'=>$cards,
            'friends'=>$friends,
            'userName' => $this->UserModel->getName($id),
            'pictureUrl' => $this->UserModel->getPicture($id),
        );
        $this->load->view('myself',$data);
    }
}