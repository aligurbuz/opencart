<?php

class ControllerExtensionModuleFmanager extends Controller {

    public function index() {
        require_once(DIR_SYSTEM . 'fmanager/dialog.php');
    }

    public function upload() {
        require_once(DIR_SYSTEM . 'fmanager/upload.php');
    }

    public function ajax_calls() {
        require_once(DIR_SYSTEM . 'fmanager/ajax_calls.php');
    }

    public function execute() {
        require_once(DIR_SYSTEM . 'fmanager/execute.php');
    }

    public function download() {
        require_once(DIR_SYSTEM . 'fmanager/force_download.php');
    }

}

?>