<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
{

	private $api_url = 'http://localhost:8180/proyek';

	public function index()
	{
		$data['proyek'] = $this->get_all_proyek();
		$this->load->view('proyek_list', $data);
	}

	public function create()
	{
		$data['lokasi'] = $this->get_all_lokasi();
		$this->load->view('proyek_form', $data);
	}

	public function save()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'nama' => $this->input->post('nama'),
			'lokasi_id' => $this->input->post('lokasi_id')
		);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$output = curl_exec($ch);
		curl_close($ch);

		redirect('proyek');
	}

	public function edit($id)
	{
		$data['proyek'] = $this->get_proyek_by_id($id);
		$data['lokasi'] = $this->get_all_lokasi();
		$this->load->view('proyek_form', $data);
	}

	private function get_proyek_by_id($id)
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

		redirect('proyek');
	}

	private function get_all_lokasi()
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://localhost:8180/lokasi');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		return json_decode($output, true);
	}
	private function get_all_proyek()
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
