<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'WebService\Controller\Servico' => 'WebService\Controller\ServicoController',
        ),
    ),
    'services' => array(
        'factories' => array(
            'WebService\Service\ExtranetService' => 'WebService\Factory\ExtranetServiceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'servico' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/servico[/:action][/]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'WebService\Controller',
                        'controller'    => 'WebService\Controller\Servico',
                        'action'        => 'index'
                    )
                )
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'WebService' => __DIR__ . '/../view',
        ),
    ),
);
