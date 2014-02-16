<?php

namespace PR2\ForumBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PR2ForumBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
