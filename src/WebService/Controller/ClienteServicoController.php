<?php

namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class ClienteServicoController extends AbstractActionController
{
    // Armazena na variável o endereço do webserver no servidor
    private $_WSDL_URI = "http://localhost/extranet/servico?wsdl";
    
    public function olaAction() {
        // Instanciando o Zend Soap Cliente
        $client = new \Zend\Soap\Client($this->_WSDL_URI);
        
        /**
         * Após instanciado o client você pode usar as funções do web serviçe
         * e para saber as funções disponíveis é só acessar o endereço url que está
         * na variável $_WSDL_URI neste caso: <a href="http://localhost2/service?wsdl">http://localhost2/service?wsdl</a>
         */
        return new ViewModel(array(
            'ola' => $client->post('Jaime')
        ));
    }
}