<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  define("DB_SERVER", "localhost");
  define("DB_USER", "sabirdsUser");
  define("DB_PASS", "cassowary");
  define("DB_NAME", "sabirds");
} else {
  define('DB_SERVER', 'pdb1048.awardspace.net');
  define('DB_USER', '4383021_birds');
  define('DB_PASS', 'C0plGu1:2{mHW!:o');
  define('DB_NAME', '4383021_birds');
}
