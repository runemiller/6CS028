<?php

namespace App\Controllers;

use App\Models\BooksModel;

class Ajax extends BaseController
{
	public function get($slug = null)
	{
		$model = model(BooksModel::class);
		$data = $model->getBooks($slug);
		
		print(json_encode($data));
	}
}