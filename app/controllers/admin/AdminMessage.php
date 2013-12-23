<?php

class AdminMessage extends BaseController
{
	public function chatroom()
	{
		return View::make('admin.message.chatroom');
	}
}