<?php

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕧𝟙:
    function getAllFrom($r, $t, $w=NULL, $a=NULL, $o=NULL, $c=NULL) {
        global $from_data;
        $all = $from_data->prepare("SELECT $r FROM $t $w $a $o");
        $all->execute();
        if ($c == 'check') {
            $data = $all->rowCount();
        } else {
            $data = $all->fetchAll();
        }
        return $data;
    }

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕧𝟙 :
    function getTitle() {
        global $pageTitle;
        $print = isset($pageTitle) ? $pageTitle : "Unknown Page Title";
        return $print;
    }

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕧𝟙 :
    function countElements($s, $t) {
        global $from_data;
        $ce = $from_data->prepare("SELECT COUNT($s) FROM $t");
        $ce->execute();
        return $ce->fetchColumn();
    }

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕧𝟙 :
    function countElements2($s, $t, $f, $gid) {
        global $from_data;
        $ce = $from_data->prepare("SELECT COUNT($s) FROM $t WHERE $f = $gid");
        $ce->execute();
        return $ce->fetchColumn();
    }

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕧𝟙 :
    function checkUsers($s, $t, $v) {
        global $from_data;
        $chu = $from_data->prepare("SELECT $s FROM $t WHERE $s = ?");
        $chu->execute(array($v));
        $get = $chu->rowCount();
        return $get;
    }

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕧𝟙 :
    function getData($s, $t, $i, $v) {
        global $from_data;
        $chu = $from_data->prepare("SELECT $s FROM $t WHERE $i = ?");
        $chu->execute(array($v));
        $get = $chu->fetchColumn();
        return $get;
    }

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕍𝟙 :
    function getRecords($s, $t) {
        global $from_data;
        $last = $from_data->prepare("SELECT $s FROM $t");
        $last->execute();
        $get = $last->fetchAll();
        return $get;
    }
    
    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕍𝟙 :
    function getLatest($s, $t, $o, $l) {
        global $from_data;
        $last = $from_data->prepare("SELECT $s FROM $t ORDER BY $o DESC LIMIT $l");
        $last->execute();
        $get = $last->fetchAll();
        return $get;
    }

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕍𝟙 :
    function getLatest2($s, $t, $gid, $o, $l) {
        global $from_data;
        $last = $from_data->prepare("SELECT $s FROM $t WHERE GroupID = $gid ORDER BY $o DESC LIMIT $l");
        $last->execute();
        $get = $last->fetchAll();
        return $get;
    }

    // 𝔽𝕦𝕟𝕔𝕥𝕚𝕠𝕟_𝕧𝟙:
    function redirectPage($msg=NULL, $type='danger', $url=NULL, $time=2) {
        if($url == NULL) {
            if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
                echo "<div class='container'>";
                echo "<div class='alert alert-" . $type . "'>" . $msg . "</div>";
                echo "</div>";
                $url = $_SERVER['HTTP_REFERER'];
                header("Refresh: $time; url=$url");
                exit();
            } else {
                header("Refresh: $time; url=dashboard.php");
                exit();
            }
        } else {
            echo "<div class='container'>";
            echo "<div class='alert alert-" . $type . "'>" . $msg . "</div>";
            echo "</div>";
            header("Refresh: $time; url=$url");
            exit();
        }
    }