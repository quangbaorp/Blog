<?php namespace App\Controllers;
use App\Models\User;
class Manager extends BaseController
{
	public function dashboard()
	{
		$data = [];
		
		$userID = session()->get('id') ? session()->get('id') : NULL;

		$model = new User();
		$data['user'] =  $model->where('id', $userID)->first();

		echo view('Admin/dashboard' , $data);
	}

	//--------------------------------------------------------------------

}
