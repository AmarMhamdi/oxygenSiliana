<?php

namespace Oxygen\SalleDeSportBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OxygenSalleDeSportBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
