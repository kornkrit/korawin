<?php
  define("DB_HOST","localhost");
  define("DB_USER","root");
  define("DB_PASS","08102535");
  define("DB_NAME","db_korawin");
  
  $dbc = mysql_connect(DB_HOST,DB_USER,DB_PASS);
  mysql_select_db(DB_NAME,$dbc);
?>
