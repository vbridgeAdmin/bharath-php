<?php
$dbconnect = mysql_connect ("localhost", "root", "");
if (!$dbconnect)
  {
    echo ("<P>Unable to connect to the database server at this time.</P>".
	  mysql_error ());
    exit ();
  }
if (!@mysql_select_db ("test"))
  {
    echo ("<P>Unable to locate </P>");
    exit ();

  }
?>