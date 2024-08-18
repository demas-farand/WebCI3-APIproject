<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{

	private $api_url = 'http://localhost:8180/lokasi';

	public function index()
	{
		$data['lokasi'] = $this->get_all_lokasi();
		$this->load->view('lokasi_list', $data);
	}


	public function create()
	{
		$this->load->view('lokasi_form');
	}

	public function save()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama')
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$output = curl_exec($ch);
		curl_close($ch);

		redirect('lokasi');
	}

	public function edit($id)
	{
		$data['lokasi'] = $this->get_lokasi_by_id($id);
		$this->load->view('lokasi_form', $data);
	}

	private function get_lokasi_by_id($id)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->api_url . '/' . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return json_decode($output, true);
	}

	public function delete($id)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->api_url . '/' . $id);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$output = curl_exec($ch);
		curl_close($ch);

		redirect('lokasi');
	}

	private function get_all_lokasi()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return json_decode($output, true);
	}

}
?>
