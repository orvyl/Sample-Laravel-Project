<?php

class ShopController extends BaseController {

	public function index()
	{
		$pres = Product::search_product($_GET);

		return View::make('shop.shop')
				->with('ptitle','Shop')
				->with('products', $pres[0])
				->with('recipients',Mymodel::select_table('recipient'))
				->with('locations',Mymodel::select_table('state'))
				->with('occasions',Mymodel::select_table('occasion-types'))
				->with('js','functions/shop.js')
				->with('listfilters',$pres[1]);
	}

	public function product_datails($id)
	{
		$assets = array(
				'js'=>array('jquery.flexslider.js','functions/productdet.js','functions/rating.js'),
				'css'=>'flexslider.css'
			);

		$p = Product::findOrFail($id);

		return View::make('product-details.product',$assets)
				->with('ptitle','Product Details')
				->with('product',$p)
				->with('tags',explode(',', $p->tags))
				->with('images',Mymodel::select_where_res('product-images','product_id',$id))
				->with('ratings',Rate::getAllRates($id))
				->with('reviews',Rate::allReviews($id));
	}

	public function create_query()
	{
		$val = Input::get('dval');
		$type = Input::get('dtype');
		$filters = is_null(Input::get('filters')) ? array():Input::get('filters');

		if($type == 'sort')
		{
			$filters['sort'][0] = $val;
		}
		else
		{
			if(array_key_exists($type, $filters))
			{
				if(!in_array($val, $filters[$type]))
				{
					$filters[$type][count($filters[$type])] = $val;
				}
			}
			else
			{
				$filters[$type] = array($val);
			}
		}

		return URL::to('shop?'.http_build_query($filters));
	}

	public function update_query()
	{
		$val = Input::get('dval');
		$type = Input::get('dtype');
		$filters = Input::get('filters');

		unset($filters[$type][array_search($val, $filters[$type])]);

		return URL::to('shop?'.http_build_query($filters));
	}

	public function addRate()
	{
		$v = Validator::make(Input::all(), array('comment'=>'required'), array('comment.required'=>'Please give your review.'));

		if($v->fails())
		{
			$m = $v->messages();
			Session::flash('addrevmsg','<p style="text-align: center;">'.$m['comment']->first().'</p>');
			return Redirect::to('shop/'.Input::get('product_id').'#comment-area');
		}
		else
		{
			$r = new Rate();
			$r->comment = Input::get('comment');
			$r->user_id = Auth::user()->id;
			$r->product_id = Input::get('product_id');
			$r->score_quality  =Input::get('score_quality');
			$r->score_value = Input::get('score_value');
			$r->score_service = Input::get('score_service');
			$r->score_fun = Input::get('score_fun');

			if($r->save())
			{
				Session::flash('addrevmsg','<p style="text-align: center;">Review successfully posted!</p>');

				$red = 'shop/'.Input::get('product_id');
				if(Input::get('redirect_to'))
					$red = Input::get('redirect_to');

				return Redirect::to($red.'#comment-area');
			}
		}
	}

}