<?php

namespace WebService\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Soap\AutoDiscover;

class ServicoController extends AbstractActionController
{
    // Armazena na variável o endereço do webserver no servidor
    private $_WSDL_URI = "http://localhost/extranet/servico?wsdl";
    
    public function indexAction() {
        
        /* 
         * verifica se for passado o parametro url wsdl
         * se passado o parâmetro acessamos a função handleWSDL 
         * e carregamos as funções, pois retornaremos o WSDL
         */
        if (isset($_GET['wsdl'])) {
            $this->handleWSDL();
        } else {
            $this->handleSOAP();
        }
        
        $view = new ViewModel();
        $view->setTerminal(true);
        exit();
    }
    
    public function handleWSDL() {
        $autodiscover = new AutoDiscover();
        
        /**
         * Criamos um novo diretorio chamado Service e criamos a class ExtranetService
         * depois setamos a classe no autodiscover no metodo setClass
         */
        $autodiscover->setClass('\WebService\Service\ExtranetService');
        
        // Setamos o Uri de retorno sem o parâmetro ?wdsl
        $autodiscover->setUri('http://localhost/extranet/servico');
        $autodiscover->setServiceName('ExtranetWebService');
        header("Content-Type: text/xml");
        
        $wsdl = $autodiscover->generate();
        $wsdl = $wsdl->toDomDocument();
        echo $wsdl->saveXML();
    }
    
    public function handleSOAP() {
        $soap = new \Zend\Soap\Server($this->_WSDL_URI);
        
        /**
         * Criamos um novo diretorio chamado Service e criamos a class ExtranetService
         * depois setamos a classe no autodiscover no metodo setClass
         */
        $soap->setClass('\WebService\Service\ExtranetService');
        
        // Leva pedido do fluxo de entrada padrão
        $soap->handle();
    }    
}