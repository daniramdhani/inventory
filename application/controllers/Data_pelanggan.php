<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load library
        $this->load->library(['template', 'form_validation']);
        //load model
        $this->load->model('m_pelanggan');

        header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    public function index()
    {
        //cek apakah user yang login adalah admin atau bukan
        //jika bukan maka alihkan ke dashboard
        $this->is_admin();

        $data = [
            'title' => 'Data Pelanggan',
            'wilayah' => $this->getwilayah()
        ];
        
        $this->template->kasir('pelanggan/index', $data);
    }
    public function getwilayah()
    {
        $this->is_admin();
        //cek apakah request berupa ajax atau bukan, jika bukan maka redirect ke home
        $list = array();
        $list = $this->m_pelanggan->getNamaWilayah('%%');
      
        //siapkan variabel array
        $data = array();
                
        foreach ($list as $i) {
            $row = array();
            if ($i->sts_aktif == '1'){
                $row[] = $i->kd_wilayah;
                $row[] = $i->nama_wilayah;
                
                $data[] = $row;
            }
        }
        return array(
            "data" => $data
        );
    }

    public function _validation()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['nama_pelanggan'] = true;
        $data['alamat'] = true;
        $data['penanggungjawab'] = true;
        $data['notelp'] = true;
        $data['sts_pelanggan'] = true;
        $data['wilayah'] = true;
        $data['tglbergabung'] = true;
        $data['natglberakhir'] = true;

        $datapost   = $this->input->post('data');
        $nama_pelanggan   = $datapost[0]['value'];
        $alamat   = $datapost[1]['value'];
        $penanggungjawab   = $data[2]['value'];
        $notelp   = $data[3]['value'];
        $sts_pelanggan   = $data[4]['value'];
        $wilayah   = $data[5]['value'];
        $tglbergabung   = $data[6]['value'];

        if ($nama_pelanggan == '') {
            $data['error_string'][] = 'Nama Pelanggan wajib diisi';
            $data['inputerror'][] = 'nama_pelanggan';
            $data['nama_pelanggan'] = false;
        }

        if ($alamat == '') {
            $data['error_string'][] = 'Alamat wajib diisi';
            $data['inputerror'][] = 'alamat';
            $data['alamat'] = false;
        }
        if ($penanggungjawab == '') {
            $data['error_string'][] = 'Penanggung Jawab wajib diisi';
            $data['inputerror'][] = 'penanggungjawab';
            $data['penanggungjawab'] = false;
        }
        if ($notelp == '') {
            $data['error_string'][] = 'No. Telp wajib diisi';
            $data['inputerror'][] = 'notelp';
            $data['notelp'] = false;
        }
        if ($sts_pelanggan == '') {
            $data['error_string'][] = 'Sts. Pelanggan wajib diisi';
            $data['inputerror'][] = 'sts_pelanggan';
            $data['sts_pelanggan'] = false;
        }
        if ($wilayah == '') {
            $data['error_string'][] = 'Wilayah wajib diisi';
            $data['inputerror'][] = 'wilayah';
            $data['wilayah'] = false;
        }
        if ($tglbergabung == '') {
            $data['error_string'][] = 'Tgl. Bergabung wajib diisi';
            $data['inputerror'][] = 'tglbergabung';
            $data['tglbergabung'] = false;
        }

        if ($data['nama_pelanggan'] === false || $data['alamat'] === false || $data['penanggungjawab'] === false || $data['notelp'] === false
        || $data['sts_pelanggan'] === false || $data['wilayah'] === false || $data['tglbergabung'] === false) {
            echo json_encode($data);
            exit();
        }
    }

    public function generatenorut()
    {
        $data   = $this->input->post('data');
        
        $data = $this->m_pelanggan->generatenourut($data);
        
        $this->output->set_content_type('aplication/json')->set_output(json_encode(($data)));
    }
    public function simpan_add()
    {
        $this->_validation();
        $data   = $this->input->post('data');
        $nama_pelanggan   = $data[0]['value'];
        $alamat   = $data[1]['value'];
        $penanggungjawab   = $data[2]['value'];
        $notelp   = $data[3]['value'];
        $sts_pelanggan   = $data[4]['value'];
        $wilayah   = $data[5]['value'];
        $tglbergabung   = $data[6]['value'];
        
        // $data = [
        //     'Status' => htmlspecialchars($this->input->post('status')),
        //     'KodeExternal' => htmlspecialchars($this->input->post('kodeexternal')),
        //     'NamaExternal' => htmlspecialchars($this->input->post('namaexternal')),
        // ];

        // if ($this->StatusPegawaiModel->create($data) > 0) {
            $message['status'] = 'success';
        // } else {
        //     $message['status'] = 'failed';
        // };
            
        $this->output->set_content_type('aplication/json')->set_output(json_encode(($message)));
    }

    public function tambah_data()
    {
        //cek apakah user yang login adalah admin atau bukan
        //jika bukan maka alihkan ke dashboard
        $this->is_admin();

        if ($this->input->post('submit', TRUE) == 'submit') {
            //set rules form validasi
            $this->form_validation->set_rules(
                'kode',
                'Kode Barang',
                'required|min_length[3]|max_length[6]|is_unique[tbl_barang.kode_barang]',
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 3 karakter',
                    'max_length' => '{field} maksimal 6 karakter',
                    'is_unique' => 'Kode sudah terdaftar'
                )
            );

            $this->form_validation->set_rules(
                'nama_barang',
                'Nama Barang',
                'required|min_length[3]|max_length[255]',
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 3 karakter',
                    'max_length' => '{field} maksimal 255 karakter'
                )
            );

            $this->form_validation->set_rules(
                'brand',
                'Nama Brand',
                'required|min_length[2]',
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter'
                )
            );

            $this->form_validation->set_rules(
                'harga',
                'Harga Jual',
                "required|regex_match[/^[0-9.]+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'regex_match' => '{field} hanya boleh angka'
                )
            );

            //jika data sudah valid maka lakukan proses penyimpanan
            if ($this->form_validation->run() == TRUE) {
                //masukkan data ke variable array
                $simpan = array(
                    'kode_barang' => $this->security->xss_clean($this->input->post('kode', TRUE)),
                    'nama_barang' => $this->security->xss_clean($this->input->post('nama_barang', TRUE)),
                    'brand' => $this->security->xss_clean($this->input->post('brand', TRUE)),
                    'harga' => str_replace('.', '', $this->security->xss_clean($this->input->post('harga', TRUE)))
                );

                //simpan ke database
                $save = $this->m_barang->save('tbl_barang', $simpan);

                if ($save) {
                    $this->session->set_flashdata('success', 'Data Barang berhasil ditambah...');

                    redirect('barang');
                }
            }
        }

        $data = [
            'title' => 'Tambah Data Pelanggan'
        ];

        $this->template->kasir('pelanggan/form_tambah', $data);
    }

    public function edit_data($kode_barang = '')
    {

        //cek apakah user yang login adalah admin atau bukan
        //jika bukan maka alihkan ke dashboard
        $this->is_admin();

        //cek uri
        if ($kode_barang == '') {
            $this->session->set_flashdata('error', 'Data tidak valid...');

            redirect('barang');
        }

        //ambil data barang
        $barang = $this->m_barang->getData('tbl_barang', ['kode_barang' => $kode_barang]);

        //validasi jumlah data
        if ($barang->num_rows() !== 1) {
            $this->session->set_flashdata('error', 'Data tidak valid...');

            redirect('barang');
        }

        //ketika button diklik
        if ($this->input->post('update', TRUE) == 'Update') {
            //cek apakah user merubah kode barang atau tidak
            $b = $barang->row();
            if ($b->kode_barang == $this->security->xss_clean($this->input->post('ID', TRUE))) {
                $rules_kode_barang = 'required|min_length[3]|max_length[6]';
            } else {
                $rules_kode_barang = 'required|min_length[3]|max_length[6]|is_unique[tbl_barang.kode_barang]';
            }
            //set rules form validasi
            $this->form_validation->set_rules(
                'ID',
                'Kode Barang',
                $rules_kode_barang,
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 3 karakter',
                    'max_length' => '{field} maksimal 6 karakter',
                    'is_unique' => 'Kode sudah terdaftar'
                )
            );

            $this->form_validation->set_rules(
                'nama_barang',
                'Nama Barang',
                'required|min_length[3]|max_length[255]',
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 3 karakter',
                    'max_length' => '{field} maksimal 255 karakter'
                )
            );

            $this->form_validation->set_rules(
                'brand',
                'Nama Brand',
                'required|min_length[2]',
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 2 karakter'
                )
            );

            $this->form_validation->set_rules(
                'harga',
                'Harga Jual',
                "required|regex_match[/^[0-9.]+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'regex_match' => '{field} hanya boleh angka'
                )
            );

            $this->form_validation->set_rules(
                'status',
                'Status',
                "required|min_length[1]|max_length[1]|regex_match[/^[YN]+$/]",
                array(
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} hanya boleh 1 karakter',
                    'max_length' => '{field} hanya boleh 1 karakter',
                    'regex_match' => 'Input {field} tidak valid'
                )
            );

            //jika validasi berhasil
            if ($this->form_validation->run() == TRUE) {
                //masukkan data ke variable array
                $update = array(
                    'nama_barang' => $this->security->xss_clean($this->input->post('nama_barang', TRUE)),
                    'brand' => $this->security->xss_clean($this->input->post('brand', TRUE)),
                    'harga' => str_replace('.', '', $this->security->xss_clean($this->input->post('harga', TRUE))),
                    'active' => $this->security->xss_clean($this->input->post('status', TRUE))
                );

                //simpan ke database
                $up = $this->m_barang->update('tbl_barang', $update, ['kode_barang' => $this->security->xss_clean($this->input->post('ID', TRUE))]);

                if ($up) {
                    $this->session->set_flashdata('success', 'Data Barang berhasil diperbarui...');

                    redirect('barang');
                }
            }
        }

        $data = [
            'title' => 'Edit Data Barang',
            'barang' => $barang->row()
        ];

        $this->template->kasir('data_barang/form_edit', $data);
    }

    public function stok()
    {
        //cek pegawai
        if (!$this->session->userdata('level') || $this->session->userdata('level') != 'pegawai') {
            redirect('dashboard');
        }

        $data = [
            'title' => 'Data Stok Barang'
        ];

        $this->template->kasir('data_barang/stok', $data);
    }

    public function ajax_pelanggan()
    {
        $this->is_admin();
        //cek apakah request berupa ajax atau bukan, jika bukan maka redirect ke home
        if ($this->input->is_ajax_request()) {
            //ambil list data
            $list = $this->m_pelanggan->get_datatables();
            //siapkan variabel array
            $data = array();
            $no = $_POST['start'];
            
            $wilayah = array();
            foreach ($list as $i) {
                $wilayah     = $this->m_pelanggan->getNamaWilayah($i->kd_wilayah);

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $i->kd_pelanggan;
                $row[] = $i->nama_pelanggan;
                $row[] = $i->alamat;
                $row[] = $i->penanggungjawab;
                $row[] = $i->notelp;
                $row[] = ($i->sts_lokasi == '0') ? 'Gudang' : 'Toko'; 
                $row[] = $wilayah[0]->nama_wilayah;
                $row[] = Date('d-m-Y',strtotime($i->tgl_bergabung));
                $row[] = ($i->tgl_berakhir != '') ? Date('d-m-Y',strtotime($i->tgl_berakhir)) : '';
                $row[] = '<a href="' . site_url('edit_pelanggan/' . $i->kd_pelanggan) . '" class="btn btn-warning btn-sm text-white">Edit</a>';            

                $data[] = $row;
            }

            foreach ($list as $i) {
                $row = array();
                if ($i->sts_aktif == '1'){
                    $row[] = $i->kd_wilayah;
                    $row[] = $i->nama_wilayah;
                    
                    $data[] = $row;
                }
            }
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_pelanggan->count_all(),
                "recordsFiltered" => $this->m_pelanggan->count_filtered(),
                "data" => $data
            );
            //output to json format
            echo json_encode($output);
        } else {
            redirect('dashboard');
        }
    }

    public function ajax_stok_barang()
    {
        //cek pegawai
        if (!$this->session->userdata('level') || $this->session->userdata('level') != 'pegawai') {
            redirect('dashboard');
        }
        //cek apakah request berupa ajax atau bukan, jika bukan maka redirect ke home
        if ($this->input->is_ajax_request()) {
            //ambil list data
            $list = $this->m_barang->get_datatables();
            //siapkan variabel array
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $i) {

                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $i->kode_barang;
                $row[] = $i->nama_barang;
                $row[] = $i->brand;
                $row[] = $i->stok;
                $row[] = '<span class="float-left">Rp.</span><span class="float-right">' . number_format($i->harga, 0, ',', '.') . ',-</span>';

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->m_barang->count_all(),
                "recordsFiltered" => $this->m_barang->count_filtered(),
                "data" => $data
            );
            //output to json format
            echo json_encode($output);
        } else {
            redirect('dashboard');
        }
    }

    private function is_admin()
    {
        if (!$this->session->userdata('level') || $this->session->userdata('level') != 'admin') {
            redirect('dashboard');
        }
    }
}
