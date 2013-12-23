<?php

class AdminProductsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.products.products')
				->with('ptitle','Products')
				->with('products',Product::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.products.create-product')
				->with('ptitle','Add Product')
				->with('recipients',Mymodel::select_table('recipient'))
				->with('states',Mymodel::select_table('state'))
				->with('maincat',OccType::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$res = Product::validate_products(Input::all());

		if($res->fails())
		{
			$msg = 'Please check some errors.';
			$errortype = 'nFailure';

			Session::flash('regadmin',$errortype);
			Session::flash('addmsg',$msg);

			Input::flash();
			return Redirect::to('admin/products/create')->withErrors($res);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later.';
			$errortype = 'nFailure';

			$p = new Product();

			$p->product_name = Input::get('product_name');
			$p->price = Input::get('price');
			$p->fill(array(
					'short_description'=>Input::get('short_description'),
					'product_details'=>Input::get('product_details'),
					'tags'=>Input::get('tags'),
					'validity'=>Input::get('validity'),
					'free_exchange'=>Input::get('free_exchange') ? true:false,
					'delivery_date'=>date('Y-m-d',strtotime(Input::get('delivery_date'))),
					'delivery_cost'=>Input::get('delivery_cost')
				));



			$trans = DB::transaction(function() use($p){
				$p->save();

				$this->add_recipient(Input::get('recipient'),$p->id);
				$this->add_location(Input::get('product_location'),$p->id);
				$this->add_category(Input::get('categories'),$p->id);

				// if(Input::hasFile('imgs[]'))
				if(!empty($_FILES['imgs']['tmp_name'][0]))
					$this->add_product_images(Input::file('imgs'),$p->id);

				return true;
			});

			if($trans)
			{
				Session::flash('regadmin','nSuccess');
				Session::flash('addmsg','New Product successfully created!');

				return Redirect::to('admin/products/'.$p->id.'/edit');
			}

			Session::flash('regadmin',$errortype);
			Session::flash('addmsg',$msg);

			return Redirect::to('admin/products/create');
		}
	}

	public function add_category($cats,$id)
	{
		Mymodel::delete('product-occasion','product_id',$id);

		foreach($cats as $val)
		{
			Mymodel::insert('product-occasion',array('occ_id'=>$val,'product_id'=>$id));
		}
	}

	public function add_recipient($res = array(''),$id)
	{
		Mymodel::delete('recipient-product','product_id',$id);

		foreach ($res as $key => $value) {
			Mymodel::insert('recipient-product',array('recipient_id'=>$value,'product_id'=>$id));
		}
	}

	public function add_location($res = array(''),$id)
	{
		Mymodel::delete('location-product','product_id',$id);

		foreach ($res as $key => $value) {
			Mymodel::insert('location-product',array('location'=>$value,'product_id'=>$id));
		}
	}

	public function add_product_images($files,$id)
	{
		$numerror = 0;
		$round1 = true;

		foreach ($files as $file)
		{
			$destPath = 'uploads/products';
			$ext = $file->getClientOriginalExtension();
			$filename = 'prod'.$id.date('mdyHis').Mylibrary::random_char(3).'.'.$ext;

			if(in_array($ext, array('jpg','png','jpeg','JPEG','JPG','bmp','gif','GIF')))
			{
				$add = array(
						'product_id'=>$id,
						'image'=>$filename,
						'primary'=>$round1
					);

				if($file->move($destPath,$filename))
				{
					$insert = Mymodel::insert('product-images',$add);

					if($insert)
					{
						$imgcrop = new Image_moo();

						$imgcrop->load($destPath.'/'.$filename)
								->resize_crop(290,185)
								->save_pa('press_','',TRUE);

						$imgcrop->load($destPath.'/'.$filename)
								->resize_crop(93,60)
								->save_pa('smallthumb_','',TRUE);

						$imgcrop->load($destPath.'/'.$filename)
								->resize_crop(158,83)
								->save_pa('thumbnail_','',TRUE);
					}
					// else
					// 	$numerror++;
				}
				// else
				// 	$numerror++;
			}
			// else
			// 	$numerror++;

			$round1 = false;
		}

		// return $numerror;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $id;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rec = Mymodel::select_where_res('recipient-product','product_id',$id);
		$loc = Mymodel::select_where_res('location-product','product_id',$id);
		$cats = Mymodel::select_where_res('product-occasion','product_id',$id);

		$product_recipient = array();
		foreach ($rec as $row)
		{
			$product_recipient[] = $row->recipient_id;
		}

		$product_location = array();
		foreach ($loc as $row)
		{
			$product_location[] = $row->location;
		}

		$product_occs = array();
		foreach ($cats as $row)
		{
			$product_occs[] = $row->occ_id;
		}

		return View::make('admin.products.edit-product')
				->with('ptitle','Edit Product')
				->with('recipients',Mymodel::select_table('recipient'))
				->with('states',Mymodel::select_table('state'))
				->with('product',Product::findorFail($id))
				->with('imgs',Mymodel::select_where_res('product-images','product_id',$id))
				->with('product_recipient',$product_recipient)
				->with('product_location',$product_location)
				->with('product_occs',$product_occs)
				->with('maincat',OccType::all());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$res = Product::validate_products(Input::all());

		if($res->fails())
		{
			$msg = 'Please check some errors.';
			$errortype = 'nFailure';

			Session::flash('regadmin',$errortype);
			Session::flash('addmsg',$msg);

			return Redirect::to('admin/products/'.$id.'/edit')->withErrors($res);
		}
		else
		{
			$msg = 'ERROR: Something went wrong. Please try again later.';
			$errortype = 'nFailure';

			$p = Product::findorFail($id);

			$p->product_name = Input::get('product_name');
			$p->price = Input::get('price');
			$p->fill(array(
					'short_description'=>Input::get('short_description'),
					'product_details'=>Input::get('product_details'),
					'tags'=>Input::get('tags'),
					'validity'=>Input::get('validity'),
					'free_exchange'=>Input::get('free_exchange') ? true:false,
					'delivery_date'=>date('Y-m-d',strtotime(Input::get('delivery_date'))),
					'delivery_cost'=>Input::get('delivery_cost')
				));

			$trans = DB::transaction(function() use($p){
				$p->save();

				$this->add_recipient(Input::get('recipient'),$p->id);
				$this->add_location(Input::get('product_location'),$p->id);
				$this->add_category(Input::get('categories'),$p->id);

				// if(Input::hasFile('imgs'))
				if(!empty($_FILES['imgs']['tmp_name'][0]))
					$this->add_product_images(Input::file('imgs'),$p->id);

				return true;
			});

			if($trans)
			{
				$errortype = 'nSuccess';
				$msg = 'Product successfully updated!';
			}

			Session::flash('regadmin',$errortype);
			Session::flash('addmsg',$msg);

			return Redirect::to('admin/products/'.$id.'/edit');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,$singledel = true)
	{
		$p = Product::find($id);

		if($p->delete())
		{
			Mymodel::delete('location-product','product_id',$id);
			Mymodel::delete('recipient-product','product_id',$id);
			$imgs = Mymodel::select_where_res('product-images','product_id',$id);
			foreach ($imgs as $row)
			{
				unlink('uploads/products/'.$row->image);
				unlink('uploads/products/thumbnail_'.$row->image);
				unlink('uploads/products/smallthumb_'.$row->image);
				unlink('uploads/products/press_'.$row->image);
				Mymodel::delete('product-images','pi_id',$row->pi_id);
			}
		}

		if($singledel)
		{
			Session::flash('regadmin','nSuccess');
			Session::flash('addmsg','Product(s) successfully deleted!');

			return Redirect::to('admin/products');
		}
	}

	public function destroy_multiple()
	{
		foreach (Input::get('ids') as $key => $value)
		{
			$this->destroy($value,false);
		}

		Session::flash('regadmin','nSuccess');
		Session::flash('addmsg','Product(s) successfully deleted!');

		return Redirect::to('admin/products');
	}

}