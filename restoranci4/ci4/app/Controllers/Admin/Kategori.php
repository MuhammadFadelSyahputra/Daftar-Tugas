<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kategori_M;

class Kategori extends BaseController
{
	public function index()
	{
		return redirect()->to(base_url()."/admin/kategori/read");
	}

	public function read()
	{
		$model = new Kategori_M();
		$kategori = $model ->findAll();

		$data = [
			'judul' => 'Data Kategori',
			'kategori' => $kategori
		];


		return view("kategori/select",$data);

	}

	public function create()
	{
		
		return view("kategori/insert");
		
		
	}

	public function insert()
	{
		$model = new Kategori_M();
		$model -> insert($_POST);



		return redirect()->to(base_url()."/admin/kategori");
	}

	public function find($id=null)
	{
		$model = new Kategori_M();
		$kategori = $model->find($id);

		$data = [
			'judul' => 'UPDATE DATA',
			'kategori' => $kategori
		];

		return view("kategori/update",$data);
	}

	public function update()
	{
		print_r($_POST);
		$model = new Kategori_M();
		$model->save($_POST);
		return redirect()->to(base_url()."/admin/kategori");
	}

	public function delete($id = null)
	{
		echo "proses delete data $id";

		$model = new Kategori_M();
		$model -> delete($id);
		return redirect()->to(base_url()."/admin/kategori");

	}

	//--------------------------------------------------------------------

}
