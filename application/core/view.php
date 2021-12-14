<?php

abstract class View
{
    protected abstract function getLayoutName();

// extract all data is $data is array
    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }
        // include specific layout
        include __DIR__ . '/../views/' . $this->getLayoutName();
    }
}



