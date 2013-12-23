<?php

class AdminRegistryController extends BaseController {

	public function getIndex()
	{
		$qry = "
			select id, code, registry_title, occasion_type, ((select count(*) from `registry-product` where reg_id = id)+(select count(*) from wishlist where registry_id = registry.id)) as numProd, updated_at
			from registry
		";

		return View::make('admin.registry.registry')
				->with('ptitle','Registry')
				->with('registries', DB::select($qry));
	}

	public function getRegistrydetails($id)
	{
		$registry = Registry::find($id);

		if($registry->occasion_type == 'personal')
			$data['addinfo'] = DB::table('registry-personal')->where('registry_id',$id)->first();
		else
			$data['addinfo'] = DB::table('registry-marriage')->where('registry_id',$id)->first();

		return View::make('admin.registry.registry-det',$data)
				->with('ptitle','Registry | CODE: 3-dfg58dfn389t8594')
				->with('registry', $registry)
				->with('wishlists',Wishlist::where('registry_id',$id)->get())
				->with('regProds',DB::select("select *,qty from products p inner join `registry-product` rp on p.id = rp.prod_id where reg_id = '{$id}'"))
				->with('contributors', Contribution::where('registry_id',$id)->get());
	}

}