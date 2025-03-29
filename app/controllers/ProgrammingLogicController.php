<?php

class ProgrammingLogicController extends RenderView {

    private $array;
    private $programmingLogicServices;

    public function __construct()
    {
        $this->programmingLogicServices = new ProgrammingLogicServices();
        $this->array = [4, 8, 9, 6, 13, 2, 16];
    }

    public function iterateOverArray()
    {
        $this->loadView('home', [
            'product'  => $this->programmingLogicServices->getSecondLargestValueFromArray($this->array)
        ]);
    }

    public function getCSVFile()
    {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'arquivo.csv';
        $file = str_replace('app\controllers\\','',$file);

        $this->loadView('home', [
            'product'  => $this->programmingLogicServices->readCSVFile($file)
        ]);
    }
}