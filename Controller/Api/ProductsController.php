<?php
class ProductsController extends BaseController
{
	public function listAction()
	{
		$strErrorDesc = '';
		try {
			$data = json_decode(file_get_contents('php://input'));
			$products = new Products();
			$productsList = $products->getAll($data->start, $data->limit);
			$response = json_encode($productsList);
		} catch (Error $e) {
			$strErrorDesc = $e->getMessage() . 'Algo salió mal!';
			$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
		}
		//send output
		if (!$strErrorDesc) {
			$this->sendOutput(
				$response,
				array('Content-Type: application/json', 'HTTP/1.1 200 OK')
			);
		} else {
			$this->sendOutput(
				json_encode(array('error' => $strErrorDesc)),
				array('Content-Type: application/json', $strErrorHeader)
			);
		}
	}
	public function insertAction()
	{
		$strErrorDesc = '';
		try {
			$data = json_decode(file_get_contents('php://input'));
			$products = new Products();
			$file = null;
			if ($data->image->file != '' && $data->image->file != NULL) {
				$base64string = $data->image->file;
				$uploadpath   = 'images/';
				$parts        = explode(";base64,", $base64string);
				$imageparts   = explode("image/", @$parts[0]);
				$imagetype    = $imageparts[1];
				$imagebase64  = base64_decode($parts[1]);
				$file         = $uploadpath . uniqid() . '.' . $imagetype;
				file_put_contents($file, $imagebase64);
			}

			$action = $products->insert($data->title, $data->price, $data->description, $file);
			$response = json_encode($action);
		} catch (Error $e) {
			$strErrorDesc = $e->getMessage() . 'Algo salió mal!';
			$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
		}
		//send output
		if (!$strErrorDesc) {
			$this->sendOutput(
				$response,
				array('Content-Type: application/json', 'HTTP/1.1 200 OK')
			);
		} else {
			$this->sendOutput(
				json_encode(array('error' => $strErrorDesc)),
				array('Content-Type: application/json', $strErrorHeader)
			);
		}
	}

	public function updateAction()
	{
		$strErrorDesc = '';
		try {
			$data = json_decode(file_get_contents('php://input'));
			$products = new Products();
			$file = null;
			if ($data->image->file != '' && $data->image->file != NULL) {
				$base64string = $data->image->file;
				$uploadpath   = 'images/';
				$parts        = explode(";base64,", $base64string);
				$imageparts   = explode("image/", @$parts[0]);
				$imagetype    = $imageparts[1];
				$imagebase64  = base64_decode($parts[1]);
				$file         = $uploadpath . uniqid() . '.' . $imagetype;
				file_put_contents($file, $imagebase64);
			}
			$action = $products->update($data->id, $data->title, $data->price, $data->description, $file);
			$response = json_encode($action);
		} catch (Error $e) {
			$strErrorDesc = $e->getMessage() . 'Algo salió mal!';
			$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
		}
		//send output
		if (!$strErrorDesc) {
			$this->sendOutput(
				$response,
				array('Content-Type: application/json', 'HTTP/1.1 200 OK')
			);
		} else {
			$this->sendOutput(
				json_encode(array('error' => $strErrorDesc)),
				array('Content-Type: application/json', $strErrorHeader)
			);
		}
	}

	public function deleteAction()
	{
		$strErrorDesc = '';
		try {
			$data = json_decode(file_get_contents('php://input'));
			$products = new Products();
			$action = $products->delete($data->id);
			$response = json_encode($action);
		} catch (Error $e) {
			$strErrorDesc = $e->getMessage() . 'Algo salió mal!';
			$strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
		}
		//send output
		if (!$strErrorDesc) {
			$this->sendOutput(
				$response,
				array('Content-Type: application/json', 'HTTP/1.1 200 OK')
			);
		} else {
			$this->sendOutput(
				json_encode(array('error' => $strErrorDesc)),
				array('Content-Type: application/json', $strErrorHeader)
			);
		}
	}
}
