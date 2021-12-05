<?php

namespace App\Controllers;

use \Firebase\JWT\JWT;
class Home extends BaseController
{
	public function index()
	{
		$key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;
 
        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "email" => $user['email'],
        );
         
        $token = JWT::encode($payload, $key);
		var_dump($token);
		echo view('home');
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
		echo view('home');
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
			$this->returnError(400,'mot de passe manquant');
			return;
		}
		$client = $this->getConnection();
		$db = $client->saynadb;
		$loginQuery = array('email' => $email);
	 	 $userByLogin = $db->user->find($loginQuery)->toArray();
		if($userByLogin != null)
        {
			foreach ($userByLogin as $row)  {
				$mdps = $row->password;
				if(password_verify($password, $mdps)) {
					$arr = array('status' => 200,'error' => false,'message' =>'L\'utilisateur a été authentifié succès','user'=> (object)$row);
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
			$this->returnError(400,'prénom manquant');
			return;
		}
		if(!isset($lastname) || trim($lastname) === '')
		{
			$this->returnError(400,'nom manquant');
			return;
		}
		if(!isset($email) || trim($email) === '')
		{
			$this->returnError(400,'Email manquant');
			return;
		}
		if(!isset($password) || trim($password) === '')
		{
			$this->returnError(400,'mot de passe manquant');
			return;
		}
		if(!isset($date_naissance) || trim($date_naissance) === '')
		{
			$this->returnError(400,'date de naissance manquant');
			return;
		}
		if(!isset($sexe) || trim($sexe) === '')
		{
			$this->returnError(400,'sexe manquant');
			return;
		}
		$client = $this->getConnection();
		$db = $client->saynadb;
		$loginQuery = array('email' => $email);
		$userByLogin = $db->user->find($loginQuery)->toArray();
		if($userByLogin != null)
        {
			$this->returnError(409,'Un compte utilisant cette adresse mail est déjà enregistré ');
			return;
		}
  		$collection = $db->user;
		$pwdCrypt = password_hash($password, PASSWORD_BCRYPT);
		$insertOneResult = $collection->insertOne(['firstname'=>$firstname,'lastname'=>$lastname,'email'=>$email,'password'=>$pwdCrypt,'token'=>$pwdCrypt,'date_naissance'=>$date_naissance,'sexe'=>$sexe]);
		if($insertOneResult->getInsertedId() != '0')
		{
			$getByIdQuery = array('_id' => $insertOneResult->getInsertedId());
			$userById = $db->user->findOne($getByIdQuery);
			$arr = array('status' => 200,'error' => false,'message' =>'L\'utilisateur a bien été créé avec succès','user'=> (object)$userById);
			header('Content-Type:application/json');
			echo json_encode($arr);	
			return;
		}
		$this->returnError(409,'Une ou plusieurs données sont erronées');
		return; 
	}

	public function addCart()
	{
		$cart = $this->request->getVar('cart');
		$month = $this->request->getVar('month');
		$year = $this->request->getVar('year');
		$default = $this->request->getVar('default');
		$idUser = $this->request->getVar('idUser');
		//var_dump($this->request->getRawInput()); return;
		if(!isset($cart) || trim($cart) === '')
		{
			$this->returnError(409,'une ou plusieurs données sont erronées');
			return;
		}
		if(!isset($month) || trim($month) === '')
		{
			$this->returnError(409,'une ou plusieurs données sont erronées');
			return;
		}
		if(!isset($year) || trim($year) === '')
		{
			$this->returnError(409,'une ou plusieurs données sont erronées');
			return;
		}
		if(!isset($default) || trim($default) === '')
		{
			$this->returnError(409,'une ou plusieurs données sont erronées');
			return;
		}
		if(strlen($cart) <16 && strlen($cart)>19)
		{
			$this->returnError(402,'informations bancaire incorrectes');
			return;
		}
		try
			{
				
				$client = $this->getConnection();
				$getByIdQuery = array('_id' => $idUser);
				$cartById = (object)$client->saynadb->card->findOne($getByIdQuery);
			
				if($cartById != null)
				{
					$this->returnError(409,'La carte existe déjà');
					return; 
				}else{
					$inserted = $client->saynadb->card->insertOne(['idUser'=> $idUser, 'cartNumber' => $cart , 'month' => $month , 'year' => $year , 'default' => $default ]
					);
				}
				$arr = array('status' => 200,'error' => false,'message' =>'Vos données ont été mises à jour');
				header('Content-Type:application/json');
				echo json_encode($arr);	
				
			}
			catch(\Exception $e)
			{
				$this->returnError(409,'Une ou plusieurs données sont erronées');
				return; 
			}
	}

	public function deleteUser()
	{

		//delete
		//getTokenAuthorization 
		//getUserByToken
		try
		{
			$client = $this->getConnection();
			$collection = $client->saynadb->user;
			$getByIdQuery = array('nom' =>'rakoto');
			//$collection->deleteOne([['_id' =>new \MongoDB\BSON\ObjectID('61ab2c68da190000110047e7')], ['limit' => 1]]);
			$collection->deleteOne($getByIdQuery);
			$arr = array('status' => 200,'error' => false,'message' =>'Votre compte été supprimé avec succès');
			header('Content-Type:application/json');
			echo json_encode($arr);	
			return;

		}
		catch(\Exception $e)
		{
			$this->returnError(401,'Votre token n\'est pas correct');
			return; 
		}
	}

	public function listSongs()
	{

		$key = getenv('JWT_SECRET');
		
        $header = $this->request->getHeader("Authorization");
        $token = null;
		var_dump($header);
 
        // extract the token from the header
        if(!empty($header)) {
            if (preg_match('/Bearer\s(\S+)/', $header, $matches)) {
                $token = $matches[1];
            }
        }

 
        // check if token is null or empty
        var_dump($token); return;

		
		$client = $this->getConnection();
		//listSongs
		$collection = $client->saynadb->songs;
		$result = $collection->find()->toArray();
		$arr = array('status' => 200,'error' => false,'songs'=> $result);
		header('Content-Type:application/json');
		echo json_encode($arr);	
		return;

	}

	public function getSongById($id)
	{
		if(!isset($id) || trim($id) === '')
		{
			$this->returnError(400,'id song manquant');
			return;
		}
		//song byId
		$client = $this->getConnection();
		try{
			$getSongByIdQuery = array('_id' => new \MongoDB\BSON\ObjectID($id));
			$songByID = $client->saynadb->songs->findOne($getSongByIdQuery);
			if($songByID != null)
			{
				$arr = array('status' => 200,'error' => false,'song'=> (object)$songByID);
				header('Content-Type:application/json');
				echo json_encode($arr);	
				return;	
			}
			else 
			{
				$this->returnError(409,'L\'audio n\'est pas accessible');
				return;
			}
		}
		catch(\Exception $e)
		{
			$this->returnError(409,'L\'audio n\'est pas accessible');
			return;
		}
	}

	public function getBills()
	{
		$client = $this->getConnection();
		$collection = $client->saynadb->bills;
		$result = $collection->findOne();
		$arr = array('status' => 200,'error' => false,'bill'=> $result);
		header('Content-Type:application/json');
		echo json_encode($arr);	
		return;
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
