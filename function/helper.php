<?php

function getStatus($status) {
    switch ($status) {
        case '1':
            $label = "<span class='badge text-bg-danger'>Sedang Dipinjam</span>";
            break;
        case '2':
            $label = "<span class='badge text-bg-primary'>Sudah Dikembalikan</span>";
        default:
            $label = "";
            break;
    }

    return $label;
}

?>