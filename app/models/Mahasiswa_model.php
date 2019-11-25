<?php 

class Mahasiswa_model {
    // private $mhs = [
    //     [
    //     "name" => "Hanas Bayu Pratama",
    //     "nim" => "1820010087",
    //     "email" => "hanasoke@gmail.com",
    //     "major" => "Software Engineer"
    //     ],
    //     [
    //         "name" => "Ferdiansyah",
    //         "nim" => "2132321239",
    //         "email" => "ferdikings@gmail.com",
    //         "major" => "Software Engineer"
    //     ],
    //     [
    //         "name" => "David Ardian Alim",
    //         "nim" => "2112521738",
    //         "email" => "davids@gmail.com",
    //         "major" => "Networking"
    //     ]
    // ];

    private $dbh; // database handler
    private $stmt;

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        // return $this->mhs;
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}