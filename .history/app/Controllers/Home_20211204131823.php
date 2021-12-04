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
		$client = $this->getConnection();
		$db = $client->saynadb;
		$loginQuery = array('email' => $email);
		//,['projection' => [ 'firstname' => 1,'lastname' => 1,	'email' => 1,'sexe' => 1,'role' => 1,'dateNaissance' => 1,'createdAt' => 1,'updateAt' => 1,'token' => 1]]
  		$userByLogin = $db->user->find($loginQuery,['projection' => {'email' => 1,'password' =>0 }])->toArray();
		if($userByLogin != null)
        {
			foreach ($userByLogin as $row)  {
				$mdps = $row->password;
				if(password_verify($password, $mdps)) {
					$arr = array('status' => 200,'error' => false,'message' =>'L utilisateur a éta authentifié succès','user'=> (object)$row);
					header('Content-Type:application/json');
					echo json_encode($arr);	
					return;
				}
				
			} 
			$this->returnError(400,'Email/password incorrect');
			return;
			
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

		$firstname = $this->request->getVar('firstname');
		$lastname = $this->request->getVar('lastname');
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$date_naissance = $this->request->getVar('date_naissance');
		$sexe = $this->request->getVar('sexe');
		if(!isset($firstname) || trim($firstname) === '')
		{
			$this->returnError(400,'Email manquant');
			return;
		}
		if(!isset($password) || trim($password) === '')
		{
			$this->returnError(400,'password manquant');
			return;
		}
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
		$client = $this->getConnection();
		$db = $client->saynadb;
  		$collection = $db->user;
		$pwd = "azerty";
		$password = password_hash($pwd, PASSWORD_BCRYPT);
		$collection->insertOne(['email'=>'rakoto@gmail.com','nom'=>'Rakoto','password'=>$password]);
	}

	public function addCart()
	{
			//update
	}

	public function deleteUser()
	{
		//delete
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
