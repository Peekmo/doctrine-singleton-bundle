<?php

namespace Umanit\DoctrineSingletonBundle\Twig;

use Umanit\DoctrineSingletonBundle\Helper\SingletonHelper;

/**
 * Twig helpers
 */
class SingletonExtension  extends \Twig\Extension\AbstractExtension
{
    /**
     * @var SingletonHelper
     */
    private $singletonHelper;

    /**
     * @param SingletonHelper $singletonHelper
     */
    public function __construct(SingletonHelper $singletonHelper)
    {
        $this->singletonHelper = $singletonHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig\TwigFunction('get_singleton', [$this->singletonHelper, 'getSingleton']),
        );
    }
}
