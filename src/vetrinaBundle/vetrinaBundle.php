<?php

namespace vetrinaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class vetrinaBundle extends Bundle
{  public function getParent()
    {
        return 'FOSUserBundle';
    }
}
