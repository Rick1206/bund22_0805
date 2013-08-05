<?php
session_start();
if(isset($_GET['act']) && $_GET['act']=='destroy'){
    session_destroy();
}
?>