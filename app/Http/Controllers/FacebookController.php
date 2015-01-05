<?php

namespace App\Http\Controllers;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookJavaScriptLoginHelper;
use RapliAndras\Facebook\Laravel\FacebookRedirectLoginHelper;
use \Request;
use \Redirect;
use \Response;

class FacebookController extends Controller{


	public function login(){

		// Replace 1234 with your APP_ID
		// Replace 123456789 with your APP_SECRET

		FacebookSession::setDefaultApplication('1234', '123456789');

		$redirect_url = Request::url();

		$helper = new FacebookRedirectLoginHelper($redirect_url);

		if ($session = $helper->getSessionFromRedirect())
		{
		    $request = new FacebookRequest($session, 'GET', '/me');

		    $user = $request->execute()->getGraphObject(GraphUser::className());

		    return Response::make('You have arrived, '.$user->getName());
		}

		return Redirect::to($helper->getLoginUrl());

	}

}