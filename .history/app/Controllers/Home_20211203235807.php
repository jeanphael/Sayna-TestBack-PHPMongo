<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$c = new bertugfahriozer\ci4mongodblibrary\App\Models\CommonModel();
		if($data):
			echo “Data inserted”;
			
			else:
			echo “Something went wrong”;
			endif;
		return view('welcome_message');
	}
}
