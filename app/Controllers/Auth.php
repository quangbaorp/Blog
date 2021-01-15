<?php

namespace App\Controllers;
use App\Models\User;
class Auth extends BaseController
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
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
				
			}
			else{
				$model = new User();

				$user = $model->where('email', $this->request->getVar('email'))->first();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');

			}
        }
        echo view('Auth/login' , $data);
        
    }
    // end view login user
//  *************************************************
    // view register user

    public function register()
    {
        $data = [];
		helper(['form']);
       
        
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			
			$rules = [
				'fullname' => 'required|min_length[3]|max_length[100]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[6]|max_length[255]',
				// 'password_confirm' => 'matches[password]',
			];

			if (!$this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new User();

				$newData = [
					'fullname' => $this->request->getVar('fullname'),
					'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'role' => 0,
                    'avatar' => "",
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/auth/login');
			}
		}
        echo view('Auth/register' , $data);
    }
    // end view regsiter user

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
		return redirect()->to('/');
    }
    
// ****************************************************

   
}
