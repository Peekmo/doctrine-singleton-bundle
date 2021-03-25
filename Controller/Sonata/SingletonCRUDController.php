<?php

namespace Umanit\DoctrineSingletonBundle\Controller\Sonata;

use Doctrine\ORM\EntityManagerInterface;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Umanit\MultiSiteBundle\Utils\SiteAccessesManager;

/**
 * Sonata controller to manage singletons
 */
class SingletonCRUDController extends CRUDController
{
    /**
     * {@inheritdoc}
     */
    public function listAction(Request $request): Response
    {
        $result = $this->admin->getDatagrid()->getResults();
        if (count($result) > 1) {
            return parent::listAction();
        }

        if (count($result) === 1) {
            return $this->redirect($this->admin->generateObjectUrl('edit', $result[0]));
        }

        return $this->redirect($this->admin->generateUrl('create'));
    }
}
