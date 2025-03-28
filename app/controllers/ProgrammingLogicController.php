<?php

class ProgrammingLogicController extends RenderView {

    private $array;
    private $programmingLogicResources;

    public function __construct()
    {
        $this->programmingLogicResources = new ProgrammingLogicResources();
        $this->array = [4, 8, 9, 6, 13, 2, 16];
    }

    public function iterateOverArray()
    {
        $this->loadView('home', [
            'product'  => $this->programmingLogicResources->getSecondLargestValueFromArray($this->array)
        ]);
    }
}