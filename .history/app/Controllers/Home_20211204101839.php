<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		
	}
	public function getConnection()
	{
		$client = new \MongoDB\Client(
			'mongodb+srv://admin:admin@cluster0.ngmil.mongodb.net/saynadb?retryWrites=true&w=majority'
		);
		return $client;
	}
	public function listUser()
	{
		$client = $this->getConnection();
		$collection = $client->saynadb->user;
		$result = $collection->find()->toArray();
	}
}
