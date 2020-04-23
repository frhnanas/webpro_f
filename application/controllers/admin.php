<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('akun');
        $this->load->model('obat');
        $this->load->model('transaksi');
	}
    
    public function readakun(){
        $data['data'] = $this->akun->read_akun()->result();
        $this->load->view('admin_akun', $data);
    }

    public function deleteakun($akun_id) {
		$this->akun->delete_akun($akun_id);
		redirect('admin/readakun');
	}

    public function createobat() {
		$input_data = [
            'obat_id' => $this->input->post('obat_id', true),
			'nama_obat' => $this->input->post('nama_obat', true),
			'jenis' => $this->input->post('jenis', true),
			'harga' => $this->input->post('harga', true),
			'status_obat' => $this->input->post('status_obat', true),
        ];
        
		$this->obat->create_obat($input_data);
		redirect('admin/readobat');
	}

    
    public function readobat(){
        $data['data'] = $this->obat->read_obat()->result();
        $this->load->view('admin_obat', $data);
    }

    public function updateobat() {
		$data = [
            'obat_id' => $this->input->post('obat_id', true),
            'nama_obat' => $this->input->post('nama_obat', true),
			'jenis' => $this->input->post('jenis', true),
			'harga' => $this->input->post('harga', true),
			'status_obat' => $this->input->post('status_obat', true),
		];

		$obat_id = $this->input->post('obat_id', true);
		$this->obat->update_obat($obat_id, $data);
		redirect('admin/readobat');
    }

	public function deleteobat($obat_id) {
		$this->obat->delete_obat($obat_id);
		redirect('admin/readobat');
	}
    
    public function readtransaksi(){
        $data['data'] = $this->transaksi->read_transaksi()->result();
        $this->load->view('admin_transaksi', $data);
    }


    public function updatetransaksi() {
		$data = [
            'transaksi_id' => $this->input->post('transaksi_id', true),
            'nama_pemesan' => $this->input->post('nama_pemesan', true),
			'pesanan' => $this->input->post('pesanan', true),
			'total_harga' => $this->input->post('total_harga', true),
			'status_transaksi' => $this->input->post('status_transaksi', true),
		];

		$transaksi_id = $this->input->post('transaksi_id', true);
		$this->transaksi->update_transaksi($transaksi_id, $data);
		redirect('admin/readtransaksi');
    }

        
    public function deletetransaksi($transaksi_id) {
		$this->transaksi->delete_transaksi($transaksi_id);
		redirect('admin/readtransaksi');
    }

}
?>