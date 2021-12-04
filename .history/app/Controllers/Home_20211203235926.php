<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$c = new bertugfahriozer\ci4mongodblibrary\App\Models\CommonModel();
		$data = $this->common_model->getList('user');
		if($data):
			echo 'Data list';
			else:
			echo 'Something went wrong';
			endif;
		return view('welcome_message');
	}
}
