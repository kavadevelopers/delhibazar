<?php
class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array())
    {
        $this->view('template/header1');
        $this->view($template_name, $vars);
        $this->view('template/footer1');
    }
}

?>