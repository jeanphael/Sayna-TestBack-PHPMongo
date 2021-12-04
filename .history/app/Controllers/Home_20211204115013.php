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
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		if(!isset($email) || trim($email) === '')
		{
			$this->returnError(400,'Email manquant');
			return;
		}
		if(!isset($password) || trim($password) === '')
		{
			$this->returnError(400,'password manquant');
			return;
		}
		$userByLogin = null;
		if($userByLogin != null)
        {
			$arr = array('status' => 200,'error' => false,'message' =>'L utilisateur a éta authentifié succès','user'=> (object)$userByLogin);
			header('Content-Type:application/json');
			echo json_encode($arr);	
		}
		else
		{
			$this->returnError(400,'Email/password incorrect');
			return;
		}
	}
	public function returnError($statusCode,$errorMsg)
	{
		$arr = array('status' => $statusCode,'error' => true,'message' =>$errorMsg);
		header('Content-Type:application/json');
		echo json_encode($arr);	
	}

	public function register()
	{
		$client = $this->getConnection();
		$db = $client->saynadb;
  		$collection = $db->user;
		$collection->insertOne(['nom'=>'Randria']);
	}

	public function addCart()
	{

	}

	public function deleteUser()
	{
		$client = $this->getConnection();
		$collection = $client->saynadb->user;
		$collection->deleteOne([['_id' =>new \MongoDB\BSON\ObjectID('61ab2c68da190000110047e7')], ['limit' => 1]]);
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
