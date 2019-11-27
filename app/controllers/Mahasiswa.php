<?php 

class Mahasiswa extends Controller {
    public function index()
    {
        $data['head'] = 'List of Students';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['head'] = 'Student Detail';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        // var_dump($_POST);
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            Flasher::setFlash('success', 'Added', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
        else {
            Flasher::setFlash('fail', 'Added', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {
            Flasher::setFlash('success', 'Deleted', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
        else {
            Flasher::setFlash('fail', 'Deleted', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}