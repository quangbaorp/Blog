<?php namespace App\Controllers;
use App\Models\User;
class Home extends BaseController
{
	public function index()
	{
		$data = [];
		
		$userID = session()->get('id') ? session()->get('id') : NULL;

		$model = new User();
		$data['user'] =  $model->where('id', $userID)->first();

		echo view('Home/index' ,$data);
	}

	//--------------------------------------------------------------------

}
