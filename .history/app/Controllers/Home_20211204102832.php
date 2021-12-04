<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$this->listUser();
	}
	public function getConnection()
	{
		$client = new \MongoDB\Client(
			'mongodb+srv://admin:admin@cluster0.ngmil.mongodb.net/saynadb?retryWrites=true&w=majority'
		);
		return $client;
	}

	public function pageIndex()
	{

	}

	public function login()
	{

	}

	public function register()
	{

	}

	public function addCart()
	{

	}

	public function deleteUser()
	{

	}

	public function listSongs()
	{

	}

	public function getSongById()
	{

	}

	public function getBills()
	{


	}

	//Function test
	public function listUser()
	{
		$client = $this->getConnection();
		//	$collection = $client->nombasededonnees->nomtable;
		$collection = $client->saynadb->user;
		//find 
		$result = $collection->find()->toArray();
		echo json_encode($result);
	}
}
