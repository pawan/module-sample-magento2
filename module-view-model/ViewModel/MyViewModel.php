<?php

namespace Pawan\ViewModel\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class MyViewModel implements ArgumentInterface
{
    
    public function __construct()
    {
        //Add You code as per req
    }

    public function getPostData()
    {
        return "here";
    }
}
