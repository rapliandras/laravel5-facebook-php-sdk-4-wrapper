<?php

namespace App\Http\Controllers;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookJavaScriptLoginHelper;
use RapliAndras\Facebook\Laravel\FacebookRedirectLoginHelper;

class FacebookController extends Controller{

	public function login(\Illuminate\Cookie\CookieJar $cookieJar, Request $request)
	{
		// Replace 1234 with your APP_ID
		// Replace 123456789 with your APP_SECRET

		FacebookSession::setDefaultApplication('1234', '123456789');

		$helper = new FacebookRedirectLoginHelper(\Request::url());

		if ($session = $helper->getSessionFromRedirect())
		{
		    $request = new FacebookRequest($session, 'GET', '/me');

		    $userData = $request->execute()->getGraphObject(GraphUser::className());

			$cookieJar->queue(cookie('access_token', $session->getAccessToken(), 45000));
		}

		return redirect($helper->getLoginUrl());

	}

}