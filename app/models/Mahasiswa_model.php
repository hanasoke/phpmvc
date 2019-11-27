<?php 

class Mahasiswa_model {

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa 
                    VALUES
                ('', :nama, :nim, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['name']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['major']);

        $this->db->execute();

        return $this->db->rowCount();

        // untuk test error tolong command semua code sebelum return 0
        // return 0;

    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id =:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

}