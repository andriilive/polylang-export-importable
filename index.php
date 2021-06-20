<?php

require __DIR__ . '/vendor/autoload.php';

use League\Csv\Reader;
use League\Csv\Statement;


use Gettext\Translation;
use Gettext\Generator\MoGenerator;
use Gettext\Generator\PoGenerator;

$src = 'src/*.csv';
$files = glob($src);

//var_dump($files);

foreach ( $files as $file) {
    $csv = Reader::createFromPath($file, 'r');
    $csv->setDelimiter(';');
    $csv->setHeaderOffset(1);

    $stmt = Statement::create();


    $records = $stmt->process($csv);

    foreach ($records as $record) {
        //do something here
    }

}