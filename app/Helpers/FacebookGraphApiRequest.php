<?php namespace App\Helpers;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Facebook\FacebookResponse;
use Facebook\GraphAlbum;
use Facebook\GraphPage;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphUserPage;


class FacebookGraphApiRequest {

  protected $app_id;
  protected $app_secret;
  protected $session;
  protected $response;
  protected $request;

  public function __construct(){

    $this -> app_id = getenv('FB_APP_ID');
    $this -> app_secret = getenv('FB_APP_SECRET');
    $this -> startSession();
	
  }

  public function startSession(){

    FacebookSession::setDefaultApplication($this -> app_id, $this -> app_secret);

    // If you're making app-level requests:
    $this -> session = FacebookSession::newAppSession();

    // To validate the session:
    try {
      $this -> session->validate();
      } 
      catch (FacebookRequestException $ex) {
      // Session not valid, Graph API returned an exception with the reason.
      echo $ex->getMessage();
      } catch (\Exception $ex) {
      // Graph API returned info, but it may mismatch the current app or have expired.
      echo $ex->getMessage();
    }
  }

  public function request($method, $uri){
    $this -> request = new FacebookRequest($this -> session, $method, $uri);
    $this -> response = $this -> request->execute()->getGraphObject();
    $this -> responseDataArray = $this -> response->getProperty('data')->asArray();
  }

  public function getSession(){
    return $this -> session;
  }

  public function getRequest(){
    return $this -> request;
  }

  public function getResponse(){
    return $this -> response;
  }

  public function getResponseDataArray(){
    return $this -> responseDataArray;
  }



         
}

