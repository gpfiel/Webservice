<?php
namespace WebService\Service;

use Doctrine\Common\Persistence\ObjectManager;

class ExtranetService
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * @return string
     */
    public function ping()
    {
        try {
            $this->objectManager->getConnection()->connect();

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
