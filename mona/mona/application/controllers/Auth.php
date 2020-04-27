<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require APPPATH . '/libraries/REST_Controller.php';

class Auth extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->helper(array('form','url'));
    $this->load->library('form_validation');
  }

  public function index()
  {
    if(empty($this->session->userdata('authenticated'))){
      $this->load->view('login');
    }else{
      if ($this->session->userdata('level')==1) {
        redirect('admin','refresh');
      } else{
        redirect('calon','refresh');
      }      
    }
  }


  public function cek_login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password'); 

    $user = $this->UserModel->get_user($username,md5($password));

    if(empty($user)){ 
      $this->session->set_flashdata('message', 'Username tidak ditemukan'); 
      $data = array(
        'result' => false, 
        'ket' => 'username tidak ditemukan', 
      );   
    }else{
      $session = array(
        'authenticated'=>true,
        'level'     =>$user->id_level, 
        'username'  =>$user->username, 
        'password'  =>$user->password, 
        'nama_user' =>$user->nama_user, 
        // 'foto'      =>$user->foto, 
        'id_user'   =>$user->id_user
      );
      $this->session->set_userdata($session); 
      $data = array(
        'result'  => true, 
        'ket'     => 'Berhasil Login',
        'session' => $session
      );      
    }
    echo json_encode($data);
  }

  public function register()
  {
    $username = $this->input->post('username_reg');
    $password = $this->input->post('password_reg'); 
    $level    = $this->input->post('level');

    $isi = array(
      'username' => $username, 
      'password' => md5($password), 
      'id_level' => $level, 
    ); 

    /*cek username*/
    if ($this->UserModel->cek_username($username)==0) {
      $reg = $this->UserModel->register($isi);
      if ($reg) {
        $data = array(
          'result'  => true, 
          'ket'     => 'Berhasil Registrasi',
          'isi'     => $this->UserModel->cek_username($username)
        ); 
      } else {
        $data = array(
          'result'  => false, 
          'ket'     => 'Gagal Registrasi',
          'isi'     => $isi
        );
      }
    }else{
      $data = array(
          'result'  => false, 
          'ket'     => 'Gagal Registrasi, Username sudah ada yang punya',
          'isi'     => $isi
        );
    }
    echo json_encode($data);    
  }

  public function logout(){
      $this->session->sess_destroy(); // Hapus semua session
      redirect('auth'); // Redirect ke halaman login
  }

  public function get_session()
  {
    echo json_encode($this->session->userdata());
  }
}