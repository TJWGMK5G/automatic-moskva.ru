<?php
        if(empty($_GET['page'])) {
            $path = $this->path_to_files."/pages/index.htm";
        }
        else {
            $page = (string)$_GET['page'];
            $page = strip_tags(stripslashes($page));
            $path = $this->path_to_files."/pages/{$page}.htm";
        }
        if(file_exists($path)) {
            echo file_get_contents($path);
        }
        else {
            echo '404';
        }
    }
?>
