<?php

namespace FairCounts\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FairCountsUserBundle extends Bundle
{
  public function getParent()
  {
      return 'FOSUserBundle';
  }
}
