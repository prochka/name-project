<?php
 class Template{ private $content; private $sets = array(); public function __construct($tmp_file) { $this->content = file_get_contents($tmp_file); } public function set($name, $value){ $this->sets[$name] = $value; } public function display(){ foreach($this->sets as $key=>$value){ $teg = "[$key]"; $this->content = str_replace($teg, $value, $this->content); } return $this->content; } } ?>
