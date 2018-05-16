<?php
/**
 * Fungsi untuk merubah bulan bahasa inggris menjadi bahasa indonesia
 * @param int nomer bulan, Date('m')
 * @return string nama bulan dalam bahasa indonesia
 */
if (!function_exists('bulan')) {
    function bulan(){
        $bulan = Date('m');
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}
/**
 * Fungsi untuk membuat tanggal dalam format bahasa indonesia
 * @param void
 * @return string format tanggal sekarang (contoh: 22 Desember 2016)
 */
if (!function_exists('tanggal')) {
    function tanggal() {
        $tanggal = Date('d') . " " .bulan(). " ".Date('Y');
        return $tanggal;
    }
}

function konversi_tanggal($date){
    return ;
}

function namabulan($no){
    if ($no == 1){ return "Januari"; }
    elseif ($no == 2){ return "Februari"; }
    elseif ($no == 3){ return "Maret"; }
    elseif ($no == 4){ return "April"; }
    elseif ($no == 5){ return "Mei"; }
    elseif ($no == 6){ return "Juni"; }
    elseif ($no == 7){ return "Juli"; }
    elseif ($no == 8){ return "Agustus"; }
    elseif ($no == 9){ return "September"; }
    elseif ($no == 10){ return "Oktober"; }
    elseif ($no == 11){ return "November"; }
    elseif ($no == 12){ return "Desember"; }
    }
    
?>