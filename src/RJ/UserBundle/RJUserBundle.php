<?php

namespace RJ\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RJUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
