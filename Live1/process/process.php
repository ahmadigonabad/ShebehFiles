<?php
require("functions.php");
$stream = new stream_methods;
$action = $_GET['action'];
if($action=="get_channel") echo json_encode($stream->get_channel());
if($action=="check") echo json_encode($stream->check());
if($action=="comment") echo json_encode($stream->comment());
?>