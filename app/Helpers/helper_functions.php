<?php

use Carbon\Carbon;

function getMaxPlotsCount($jadwal_munaqosahs) {
    $max_plots_count = 0;
    $max_maks_santri = 0;

    foreach ($jadwal_munaqosahs as $jadwal) {
        $plots_count = count($jadwal->plots);
        $max_plots_count = max($max_plots_count, $plots_count);

        $maksSantri = $jadwal->maks_santri;
        if ($maksSantri > $max_maks_santri) {
            $max_maks_santri = $maksSantri;
        }
    }

    return  max($max_plots_count, $max_maks_santri);
}

function ingatkanMunaqosah($jadwalMunaqosah, $materiMunaqosah, $telepon){
    $ptn = "/^0/";  // Regex
    $rpltxt = "+62";  // Replacement string
    $phone = preg_replace($ptn, $rpltxt, $telepon);
    $hari = Carbon::createFromFormat('d/m/Y H:i:s', $jadwalMunaqosah->sesi)->translatedFormat('l');
    $tanggal =  Carbon::createFromFormat('d/m/Y H:i:s', $jadwalMunaqosah->sesi)->translatedFormat('d F Y');
    $pukul =  Carbon::createFromFormat('d/m/Y H:i:s', $jadwalMunaqosah->sesi)->translatedFormat('H:i');
    $materi =  "{$materiMunaqosah->materi} ({$materiMunaqosah->keterangan})";
    $hafalan =  "{$materiMunaqosah->hafalan}";
    $guru =  $materiMunaqosah->dewan_guru;
    $text = "%5B%20*REMINDER%20MUNAQOSYAH*%20%5D%0A%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%D9%88%D8%B1%D8%AD%D9%85%D8%A9%20%D8%A7%D9%84%D9%84%D9%87%20%D9%88%D8%A8%D8%B1%D9%83%D8%A7%D8%AA%D9%87.%20%0A%0AMengingatkan%20bahwa%20Anda%20*terjadwal%20Munaqosyah*%20%3A%0A%0AHari%2C%20tanggal%20%3A%20{$hari}%2C%20{$tanggal}%0APukul%20%3A%20{$pukul}%0AMateri%20%3A%20{$materi}%0AHafalan%20%3A%20{$hafalan}%0ADewan%20Guru%20%3A%20{$guru}%0A%0AUntuk%20tempat%20pelaksanaan%20bisa%20dilihat%20dijarkoman%20grup.%0A%0A*Nb*%3A%0AApabila%20berhalangan%20harap%20konfirmasi%20dan%20mencari%20pengganti%20untuk%20mengisi%20slot%20kosong!%0A%0A%D8%A7%D9%84%D8%AD%D9%85%D8%AF%20%D9%84%D9%84%D9%87%20%D8%AC%D8%B2%D8%A7%D9%83%D9%85%20%D8%A7%D9%84%D9%84%D9%87%20%D8%AE%D9%8A%D8%B1%D8%A7.%20%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%D9%88%D8%B1%D8%AD%D9%85%D8%A9%20%D8%A7%D9%84%D9%84%D9%87%20%D9%88%D8%A8%D8%B1%D9%83%D8%A7%D8%AA%D9%87.%20%0A____%0AS%26T%20Keilmuan%20%7C%20DMC-Pasus%20%7C%20PPMRJSka";
    $url = "https://wa.me/{$phone}?text={$text}";
    return $url;
}
