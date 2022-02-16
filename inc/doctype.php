<?php
require_once __DIR__ . '/../../common_new.php';


$mnPtRes    =   $db->select("cs_part","where part_index=1 AND part_display_check=1 order by part_ranking asc");
