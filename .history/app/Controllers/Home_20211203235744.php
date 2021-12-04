<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$c = new bertugfahriozer\ci4mongodblibrary\App\Models\CommonModel();
		if($data):
			echo “Data inserted”;die;
			else:
			echo “Something went wrong”;die;
			endif;
		return view('welcome_message');
	}
}
