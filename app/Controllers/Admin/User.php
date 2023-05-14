<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;
class User extends BaseController
{
   
    public function listUser()
    {
        $user_model = new UserModel();
        $users = $user_model->findAll();
        $data['title'] = "List user";
        $data['users'] = $users;
        $data['left'] = view("Views/admin/layout/left");
        $data['head'] = view("Views/admin/layout/head");
        $data['content'] = view("Views/admin/pages/userList", $data);
        return view('Views/admin/main', $data);
    }

    public function add(){
        $user_model = new UserModel();
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
           
            $image->move('./assets/avatars');
        }
        $imagename = $image->getName();
        $data = [
            'user_name' => $_POST['name'],
            'user_fullname' => $_POST['fullname'],
            'user_password' => $_POST['password'],
            'user_email'    => $_POST['email'],
            'user_image'    => $imagename,
        ];
        $user_model->insert($data);
        return ('<script>window.location.assign("/admin/user")</script>');
    }

    public function edit(){
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
            $image->move('./assets/avatars');
        }
        $imagename = $image->getName();
        if(!empty($imagename)) {
            if($_POST['oldimage']!=null){
                unlink('./assets/avatars/' . $_POST['oldimage']);
            }  
        }

        if ($imagename == "") {
            $imagename = $_POST['oldimage'];
        }
        $user_model = new UserModel();
        $data = [
            'user_name' => $_POST['name'],
            'user_fullname' => $_POST['fullname'],
            'user_password' => $_POST['password'],
            'user_email'    => $_POST['email'],
            'user_image'    =>  $imagename,
        ];
        $user_model->update($_POST['id'], $data);
        $session = session();
        $session->set('s_image',$imagename);
        return ('<script>window.location.assign("/admin/user")</script>');
    }

    public function delete(){
        if($_POST['image']!=""){
            unlink('./assets/avatars/' . $_POST['image']);
        }
        $user_model = new UserModel();
        $user_model->delete($_POST['id']);
        return ('<script>window.location.assign("/admin/user")</script>');
    }
    public function loginPage(){
        $session = session();
            $session->destroy();
        
        return view('/admin/pages/login');
    }
    public function loginAction(){
        
        $session = session();
        $taikhoan_model=new UserModel();
        $rs=$taikhoan_model->where('user_name',$this->request->getPost('username'))
                       ->where('user_password',$this->request->getPost('password'))->first();
        if($rs){
            $session->set('s_username',$rs['user_name']);
            $session->set('s_password',$rs['user_password']);
            $session->set('s_image',$rs['user_image']);
            return '<script>window.location.assign("/admin")</script>';
        }
        else{
            return '<script>window.location.assign("/admin/login")</script>';
        }
    }
   
  
}
