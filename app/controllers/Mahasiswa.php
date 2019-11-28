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

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ) {
            Flasher::setFlash('success', 'Changed', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
        else {
            Flasher::setFlash('fail', 'Changed', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function search()
    {
        $data['head'] = 'List of Students';
        $data['mhs'] = $this->model('Mahasiswa_model')->searchDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}