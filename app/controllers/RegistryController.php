<?php

class RegistryController extends BaseController {

	public function index()
	{
		$content = Page::find(7);

		return View::make('registry.registry')
				->with('ptitle','Registry')
				->with('js','functions/registry.js')
				->with('content',$content->content);
	}

	public function create_personal()
	{
		return View::make('registry.create-personal')
				->with('ptitle','Create Registry - Personal')
				->with('js','functions/registry.js')
				->with('countries',Mymodel::select_table('country'))
				->with('states',Mymodel::select_table('state'));
	}

	public function createpersonal()
	{
		$v = Registry::validate_personal(Input::all());

		if($v->fails())
		{
			Input::flash();
			Session::flash('msg','<p style="text-align: center;color: white;margin: 3px;font-size: 15px;">ERROR: Please check all fields.</p>				');
			return Redirect::to('registry/create-registry-personal')->withErrors($v);
		}
		else
		{
			$addRegistry = $this->createRegistry();
			if($addRegistry[0])
			{
				$rid = $addRegistry[1];

				$addregper = array(
					'first_name'=>Input::get('first_name'),
					'last_name'=>Input::get('last_name'),
					'bday'=>date('Y-m-d',strtotime(Input::get('birthday'))),
					'registry_id'=>$rid
				);

				Mymodel::insert('registry-personal',$addregper);

				$this->createDeliveryAdress($rid);

				Session::put('rid',$rid);
				return Redirect::to('registry/wishing-well');
			}
			return 'ERROR: Something went wrong. Please try again later';
		}

	}

	public function create_marriage()
	{
		return View::make('registry.create-marriage')
				->with('ptitle','Create Registry - Marriage')
				->with('js','functions/registry.js')
				->with('countries',Mymodel::select_table('country'))
				->with('states',Mymodel::select_table('state'));
	}

	public function createmarriage()
	{
		$v = Registry::validate_marriage(Input::all());

		if($v->fails())
		{
			Input::flash();
			Session::flash('msg','<p style="text-align: center;color: white;margin: 3px;font-size: 15px;">ERROR: Please check all fields.</p>				');
			return Redirect::to('registry/create-registry-marriage')->withErrors($v);
		}
		else
		{
			$addRegistry = $this->createRegistry('marriage');
			if($addRegistry[0])
			{
				$rid = $addRegistry[1];

				$addregmar = array(
						'registry_id'=>$rid,
						'bride_fname'=>Input::get('bride_fname'),
						'bride_lname'=>Input::get('bride_lname'),
						'groom_fname'=>Input::get('groom_fname'),
						'groom_lname'=>Input::get('groom_lname'),
						'couple_type'=>Input::get('couple_type')
					);

				Mymodel::insert('registry-marriage',$addregmar);

				$this->createDeliveryAdress($addRegistry[1]);

				Session::put('rid',$rid);
				return Redirect::to('registry/wishing-well');
			}
			return 'ERROR: Something went wrong. Please try again later';
		}
	}

	public function create_others()
	{
		return View::make('registry.create-others')
				->with('ptitle','Create Registry - Others')
				->with('js','functions/registry.js')
				->with('countries',Mymodel::select_table('country'))
				->with('states',Mymodel::select_table('state'));
	}

	public function createothers()
	{
		$v = Registry::validate_personal(Input::all());

		if($v->fails())
		{
			Input::flash();
			Session::flash('msg','<p style="text-align: center;color: white;margin: 3px;font-size: 15px;">ERROR: Please check all fields.</p>				');
			return Redirect::to('registry/create-registry-others')->withErrors($v);
		}
		else
		{
			$addRegistry = $this->createRegistry();
			if($addRegistry[0])
			{
				$rid = $addRegistry[1];

				$addregper = array(
					'occasion_description'=>Input::get('occasion_description'),
					'first_name'=>Input::get('first_name'),
					'last_name'=>Input::get('last_name'),
					'bday'=>date('Y-m-d',strtotime(Input::get('birthday'))),
					'registry_id'=>$rid
				);

				Mymodel::insert('registry-personal',$addregper);

				$this->createDeliveryAdress($rid);

				Session::put('rid',$rid);
				return Redirect::to('registry/wishing-well');
			}
			return 'ERROR: Something went wrong. Please try again later';
		}

	}

	public function createRegistry($occtype = 'personal')
	{
		$r = new Registry();
		$r->user_id = Auth::user()->id;
		$r->occasion_type = $occtype;
		$r->fill(array(
				'address'=>Input::get('address'),
				'suburb'=>Input::get('suburb'),
				'country_id'=>Input::get('country'),
				'state_id'=>Input::get('state'),
				'postcode'=>Input::get('postcode'),
				'contact'=>Input::get('contact_number'),
				'currency'=>Input::get('registry_currency'),
				'code'=>Registry::createCode(Auth::user()->id),
				'registry_title'=>'(no title yet)',
				'registry_welcome'=>'(no welcome note yet)'
			));
		$r->another_address = Input::get('cc') == 'notsame' ? true:false;
		$r->email = Input::get('email');
		$r->party_date = date('Y-m-d',strtotime(Input::get('date_party')));

		if($r->save())
			return array(true,$r->id);

		return array(false);
	}

	public function createDeliveryAdress($id)
	{
		$addregdel = array(
				'registry_id'=>$id,
				'address'=>Input::get('delivery_address'),
				'suburb'=>Input::get('delivery_suburb'),
				'country_id'=>Input::get('delivery_country'),
				'postcode'=>Input::get('delivery_postcode'),
				'state_id'=>Input::get('delivery_state')
			);

		Mymodel::insert('registry-deladdress',$addregdel);
	}

	public function setupReg()
	{
		$rid = Session::get('rid');
		$listproduct = '';

		return View::make('registry.setup-registry')
				->with('ptitle','Setup Registry')
				->with('listproduct',$listproduct)
				->with('wishes',Wishlist::where('registry_id',$rid)->get())
				->with('numwishlistprod',Wishlist::where('registry_id',$rid)->count() + count(Product::registryProd($rid)))
				->with('products',Product::registryProd($rid))
				->with('registy',Registry::find($rid));
	}

	public function updateReg()
	{
		$id = Session::get('rid');

		$rules = array(
				'registry_title'=>'required',
				'registry_welcome'=>'required'
			);

		$messages = array(
				'registry_title.required'=>'Registry title is required',
				'registry_welcome.required'=>'Welcome message for registry is required'
			);

		$v = Validator::make(Input::all(), $rules, $messages);

		if($v->fails())
			return Redirect::to('registry/setup')->withErrors($v);
		else
		{
			if(Input::get('prodid1') || Input::get('prodid'))
			{
				$prodid1 = Input::get('prodid1');
				$qtyprod1 = Input::get('qtyprod1');

				$ctr = 0;
				foreach ($prodid1 as $value)
				{
					if($qtyprod1[$ctr] != '')
						DB::table('registry-product')->where('prod_id',$value)->where('reg_id',$id)->update(array('qty'=>$qtyprod1[$ctr]));

					$ctr++;
				}

				$prodid = Input::get('prodid');
				$qtyprod = Input::get('qtyprod');

				$ctr = 0;
				foreach ($prodid as $value)
				{
					if($qtyprod[$ctr] != '')
						DB::table('registry-product')->where('prod_id',$value)->where('reg_id',$id)->update(array('qty'=>$qtyprod[$ctr]));

					$ctr++;
				}
			}

			$w = Registry::find($id);
			$w->registry_title = Input::get('registry_title');
			$w->registry_welcome = Input::get('registry_welcome');

			if($w->save())
				Session::flash('msg','<p style="color: gray; text-align: center; font-size: 14px;">Wishlist successfully updated!</p>');
			else
				Session::flash('msg','<p style="color: gray; text-align: center; font-size: 14px;">ERROR: Something went wrong. Please try again later</p>');

			return Redirect::to('registry/setup');
		}
	}

	public function addGift()
	{
		$pres = Product::search_product($_GET);

		return View::make('registry.add-gift')
				->with('ptitle','Add Gift')
				->with('listfilters',$pres[1])
				->with('products',$pres[0])
				->with('locations',Mymodel::select_table('state'))
				->with('recipients',Mymodel::select_table('recipient'))
				->with('occasions',Mymodel::select_table('occasion-types'));
	}

	public function addItemReg()
	{
		$id = Input::get('additem');
		$p = Product::findOrFail($id);

		$numProdReg = DB::table('registry-product')->where('rprod_id',$id)->count();

		if($numProdReg == 0)
		{
			Mymodel::insert('registry-product',array('prod_id'=>$id,'reg_id'=>Session::get('rid'), 'qty'=>1));
			$msg = '<p style="color: gray; text-align: center; font-size: 14px;">'.$p->product_name.' is added to your registry!</p>';
		}
		else
			$msg = '<p style="color: gray; text-align: center; font-size: 14px;">'.$p->product_name.' is already in your registry!</p>';

		Session::flash('msg',$msg);
		return Redirect::to('registry/setup');
	}

	public function addItemRegPost()
	{
		$itemsAdd = Input::get('add_product_registry');

		foreach ($itemsAdd as $value)
		{
			$numProdReg = DB::table('registry-product')->where('rprod_id',$value)->count();
			if($numProdReg == 0)
				Mymodel::insert('registry-product',array('prod_id'=>$value,'reg_id'=>Session::get('rid'),'qty'=>1));
		}

		Session::flash('msg','<p style="color: gray; text-align: center; font-size: 14px;">Registry item list successfully updated!</p>');
		return Redirect::to('registry/setup');
	}

	public function removeprodreg()
	{
		$id = Input::get('id');

		DB::table('registry-product')->where('prod_id',$id)->where('reg_id',Session::get('rid'))->delete();
		return Redirect::to('registry/setup');
	}
}