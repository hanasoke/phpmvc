<?php 

class About extends Controller {
    public function index($name = "Hanas", $job = "Students", $age = 20)
    {
        $data['name'] = $name;
        $data['job'] = $job;
        $data['age'] = $age;
        $data['head'] = 'About Me';

        // echo "Halo, nama saya $name, saya adalah seorang $job";
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['head'] = 'Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}