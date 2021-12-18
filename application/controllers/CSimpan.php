<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSimpan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('MData');
        $this->load->library('pdf');
    }

	function index()
	{
		$this->load->view('VForminput');
	}

    function prosesSimpan(){
        $tanggal            = $this->input->post('tanggal');
        $asalBuku           = $this->input->post('asalBuku');
        $nomorInvetaris     = $this->input->post('nomorInventaris');
        $pengarang          = $this->input->post('Pengarang');
        $judul              = $this->input->post('judul');
        $penerbit           = $this->input->post('penerbit');
        $tahunTerbit        = $this->input->post('tahunTerbit');
        $jml                = $this->input->post('jml');
        $nomorKlasifikasi   = $this->input->post('nomorKlasifikasi');
        $bahasa             = $this->input->post('bahasa');
        $macamKoleksi       = $this->input->post('macamKoleksi');
        $keterangan         = $this->input->post('keterangan');

        $where    = array(
            'tanggal'           => $tanggal,
            'asalBuku'          => $asalBuku,
            'nomorInventaris'   => $nomorInvetaris,
            'pengarang'         => $pengarang,
            'judul'             => $judul,
            'penerbit'          => $penerbit,
            'tahunTerbit'       => $tahunTerbit,
            'jml'               => $jml,
            'nomorKlasifikasi'  => $nomorKlasifikasi,
            'bahasa'            => $bahasa,
            'macamKoleksi'      => $macamKoleksi,
            'keterangan'        => $keterangan,
        );
        $cek = $this->MData->simpan('tbl_inventaris',$where);
        if($cek){
            redirect(base_url('dashboard'));
        }else{
            echo "gagal";
        }
    }

    function delete($id){
        $this->MData->hapusData($id);
        redirect(base_url('dashboard'));
    }

    function cetakPdf (){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Aplikasi Inventaris Buku',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Daftar buku yang sudah menjadi inventaris perpustakaan',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'Tanggal',1,0);
        $pdf->Cell(50,6,'Asal Buku',1,0);
        $pdf->Cell(40,6,'Nomor Inventaris',1,0);
        $pdf->Cell(30,6,'Pengarang',1,0);
        $pdf->Cell(20,6,'Judul',1,0);
        $pdf->Cell(20,6,'Penerbit',1,1);

        $pdf->SetFont('Arial','',10);
        $inventarisBuku = $this->db->get('tbl_inventaris')->result();
        foreach ($inventarisBuku as $row){
            $pdf->Cell(30,6,$row->tanggal,1,0);
            $pdf->Cell(50,6,$row->asalBuku,1,0);
            $pdf->Cell(40,6,$row->nomorInventaris,1,0);
            $pdf->Cell(30,6,$row->pengarang,1,0); 
            $pdf->Cell(20,6,$row->judul,1,0); 
            $pdf->Cell(20,6,$row->penerbit,1,1); 
        }

        $pdf->Output();

    }
}