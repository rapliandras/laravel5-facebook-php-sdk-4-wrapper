<?php

namespace RapliAndras\Facebook\Laravel;

use Facebook\FacebookRedirectLoginHelper as FRLH;

class FacebookRedirectLoginHelper extends FRLH
{
	protected function isValidRedirect()
	{
		return $this->getCode() && \Input::get('state', null) == $this->state;
	}

	protected function getCode()
	{
		return \Input::get('code', null);
	}

	protected function storeState($state)
	{
		\Session::put($this->getSessionKey(), $state);
	}

	protected function loadState()
	{
		return $this->state = \Session::get($this->getSessionKey(), null);
	}

	protected function getSessionKey()
	{
		return 'facebook.state';
	}
}