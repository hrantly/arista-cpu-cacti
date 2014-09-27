<?php

/* do NOT run this script through a web browser */
if (!isset($_SERVER["argv"][0]) || isset($_SERVER['REQUEST_METHOD'])  || isset($_SERVER['REMOTE_ADDR'])) {
   die("<br><strong>This script is only meant to run at the command line.</strong>");
}

if (defined('STDIN')) {
  $host = $argv[1];
  $community = $argv[2];
  $job = $argv[3];
  //sessors table oid

  $oid = 'HOST-RESOURCES-MIB::hrProcessorLoad';

  $ar = new SNMP(SNMP::VERSION_2C, $host, $community);
  $res = $ar->walk($oid, true);
  $string = '';
  foreach ($res as $k => $v ) {
    $forOutput = explode(' ', $v);
    $string .= ' ' . $k . ':' . $forOutput[1];
  }
  print_r($string);
  
}
