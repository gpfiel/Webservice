<?php
namespace WebService\Service;

use Doctrine\ORM\EntityManager;

class ExtranetService
{

    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getEntityManager()
    {
        if ($this->em === null) {
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }
    }

    /**
     * @return string
     */
    public function ping()
    {
        try {
            $this->getEntityManager()->getConnection()->connect();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @return string
     */
    public function post($nome) {
        return "Ola $nome, Seja bem vindo ao WebServer";
    }
}
