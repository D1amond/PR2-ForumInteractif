<?php

namespace PR2\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PR2UserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
