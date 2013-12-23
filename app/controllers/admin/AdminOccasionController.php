<?php

class AdminOccasionController extends BaseController {

	public $occasion_types;

	public function __construct()
	{
		$this->occasion_types = OccType::all();
	}

	public function getIndex()
	{
		$id = Input::get('otype') == '' ? 1:Input::get('otype');

		return View::make('admin.occasions.occasions')
				->with('occtid',$id)
				->with('ptitle','Occasions')
				->with('occasions',Occasion::where('occasion_type','=',$id)->get())
				->with('occasion_title',OccType::where('id','=',$id)->pluck('occasion_type'))
				->with('occasion_types',$this->occasion_types)
				->with('js','occasion.js');
	}

	public function getManage()
	{
		return View::make('admin.occasions.occtype')
				->with('occasion_types',$this->occasion_types)
				->with('ptitle','Manage Occasion Types')
				->with('js','occasion.js');
	}

	public function getCreate()
	{
		return View::make('admin.occasions.create-occtype')
				->with('ptitle','Create Occasion Type')
				->with('occasion_types',$this->occasion_types);
	}

	public function postCreate()
	{
		$v = OccType::val(Input::all());

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('admin/occasions/create')
					->withErrors($v);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later.';
			$res = 'nFailure';

			$ot = new OccType();
			$ot->occasion_type = Input::get('occasion_type');
			$ot->description = Input::get('description');

			if($ot->save())
			{
				$msg = 'New Occasion Type successfully created!';
				$res = 'nSuccess';
			}

			Session::flash('regadmin',$res);
			Session::flash('addmsg',$msg);
			return Redirect::to('admin/occasions/create');
		}
	}

	public function getEdit($id)
	{
		return View::make('admin.occasions.edit-occtype')
				->with('ptitle','Edit Occasion Type')
				->with('occasion_types',$this->occasion_types)
				->with('occtype',OccType::find($id));
	}

	public function postEdit($id)
	{
		$v = OccType::val(Input::all());

		if($v->fails())
		{
			Input::flash();
			return Redirect::to('admin/occasions/edit/'.$id)
					->withErrors($v);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later.';
			$res = 'nFailure';

			$ot = OccType::find($id);
			$ot->occasion_type = Input::get('occasion_type');
			$ot->description = Input::get('description');

			if($ot->save())
			{
				$msg = 'Occasion Type successfully updated!';
				$res = 'nSuccess';
			}

			Session::flash('regadmin',$res);
			Session::flash('addmsg',$msg);
			return Redirect::to('admin/occasions/edit/'.$id);
		}
	}

	public function delOccOfOccType($id)
	{
		Mymodel::delete('occasions','occasion_type',$id);

		$ot = OccType::find($id);
		$ot->delete();
	}

	public function postDelmul()
	{
		foreach (Input::get('occt_id') as $key => $value)
		{
			$this->delOccOfOccType($value);
		}

		Session::flash('regadmin','nSuccess');
		Session::flash('addmsg','Occasion Type(s) successfully deleted!');
		return Redirect::to('admin/occasions/manage');
	}

	public function getReorder()
	{
		$sep = explode('|', Input::get('order'));
		foreach ($sep as $key => $value)
		{
			if($value != '')
			{
				$data = explode('->', $value);
				$occtype = OccType::find($data[0]);
				$occtype->order = $data[1];
				$occtype->save();
			}
		}

		return 1;
	}

	public function getAddocc()
	{
		$occ = trim(Input::get('occname'));
		$oct = Input::get('occtype');
		Session::flash('msg','<div class="nNote nFailure"><p>ERROR: Something went wrong. Pleas try again later.</p></div>');
		if($occ != '')
		{
			$c = new Occasion();
			$c->occasion_name = $occ;
			$c->occasion_type = $oct;
			$c->order = Occasion::where('occasion_type','=',$oct)->count();
			if($c->save())
			{
				Session::flash('msg','<div class="nNote nSuccess"><p>Occasion successfully saved!</p></div>');
				return 1;
			}
			return 0;
		}
		return 0;
	}

	public function getReorderocc()
	{
		$sep = explode('|', Input::get('order'));
		foreach ($sep as $key => $value)
		{
			if($value != '')
			{
				$data = explode('->', $value);
				$occtype = Occasion::find($data[0]);
				$occtype->order = $data[1];
				$occtype->save();
			}
		}

		return 1;
	}
}