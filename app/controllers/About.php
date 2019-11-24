<?php 

class About {
    public function index($name = "Hanas", $job = "Students")
    {
        echo "Halo, nama saya $name, saya adalah seorang $job";
    }
    public function page()
    {
        echo 'About/page';
    }
}