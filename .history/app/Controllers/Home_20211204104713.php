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
		$client = $this->getConnection();
		$db = $client->selectDatabase('saynadb');
  		echo "Selected";
  		$collection = $db->selectCollection('user');
		$document = array('nom' =>  'Randria','email' => 'jeanphael@gmail.com');
		//$collection->insert($document);
	}

	public function addCart()
	{

	}

	public function deleteUser()
	{

	}

	public function listSongs()
	{
		$client = $this->getConnection();
		$collection = $client->saynadb->songs;
		$result = $collection->find()->toArray();
		echo json_encode($result);
	}

	public function getSongById()
	{

	}

	public function getBills()
	{
		$client = $this->getConnection();
		$collection = $client->saynadb->bills;
		$result = $collection->find()->toArray();
		echo json_encode($result);
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
