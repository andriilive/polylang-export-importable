<?php

// This script convers PolyLang CSV translations into mo and po files
// Place separate csv files in /scr and run

require __DIR__ . '/vendor/autoload.php';

use League\Csv\Reader;
//use League\Csv\Statement;
//use League\Csv\Writer;
use Gettext\Translation;
use Gettext\Translations;
use Gettext\Generator\MoGenerator;
use Gettext\Generator\PoGenerator;

const LANGS = ['cs', 'sk'];

$src = 'src/*.csv';
$files = glob($src);

//var_dump($files);

foreach ( $files as $file) {
    $domain = pathinfo($file, PATHINFO_FILENAME);
    $translations = Translations::create($domain);

    $reader = Reader::createFromPath($file, 'r');
    $records = $reader->getRecords();

    foreach ($records as $offset => $record) {
        $translation = Translation::create(null, $record[0]);
        $translation->translate($record[0]);
        $translations->add($translation);
    }

    //Load a PO file
    $poGenerator = new PoGenerator();
    $moGenerator = new MoGenerator();

    foreach ( LANGS as $LANG ) {
        $pofile = 'locales/'.$domain.'_'.$LANG.'.po';
        $mofile = 'locales/'.$domain.'_'.$LANG.'.mo';
        $poGenerator->generateFile($translations, $pofile);
        $moGenerator->generateFile($translations, $mofile);
    }
}