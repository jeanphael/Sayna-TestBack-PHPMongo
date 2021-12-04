<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$client = new \MongoDB\Client(
			'mongodb://$admin:$admin@cluster0.ngmil.mongodb.net:27017'
		);
		$collection = $client->saynadb->user;
		$result = $collection->find()->toArray();
		print_r($result);

	//	$c = new bertugfahriozer\ci4mongodblibrary\CommonModel();
		/*$data = $this->common_model->getList('user');
		if($data):
			echo 'Data list';
			else:
			echo 'Something went wrong';
			endif;*/
		//return view('welcome_message');
	}
}
