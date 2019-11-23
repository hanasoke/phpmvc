<?php 

class App {
    public function __construct()
    {
        // untuk cek apa saja yang akan diisikan user pada url
        // var_dump($_GET);

        $url = $this->parseURL();
        var_dump($url);

    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            // $url = $_GET['url'];
            // untuk menghapus / maka gunakan rtrim
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}