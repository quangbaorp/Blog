<?php

namespace App\Controllers;
use App\Models\User;
class Admin extends BaseController
{
    // view login user
    public function login()
    {
        $data = [];
		helper(['form']);
        
        if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[6]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new User();
				$user = $model->where('email', $this->request->getVar('email'))->first();
                if($user['role'] === '1'){
                    $this->setUserSession($user);
                    return redirect()->to('/manager/dashboard');
                }
                else {
					$session = session();
                    $session->setFlashdata('error', 'Bạn không có quyền truy cập vào Admin');
                }
			}
        }
        echo view('Admin/login', $data);
    }
    
    private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'fullname' => $user['fullname'],
			'email' => $user['email'],
			'role' => $user['role'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
    }
    
    public function logout(){
		session()->destroy();
		return redirect()->to('/auth/login');
    }
}