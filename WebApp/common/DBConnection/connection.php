<?php
if(!mysql_connect("localhost:38313","root","praxus"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("vid_anno_db"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>