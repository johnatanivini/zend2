<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
        'service_manager' => [
                'factories' => [
                    'Zend\Db\Adapter\Adapter' =>   'Zend\Db\Adapter\AdapterServiceFactory',
                    'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory'
                ],
                'abstract_factories' => [
                    'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
                    'Zend\Log\LoggerAbstractServiceFactory',
                ]
            ],
            'db' => [
                'driver' => 'Pdo',
                'dsn' => 'pgsql:dbname=pokedex;hostname=localhost',
            ],
            'translator' => [
                'locale' => 'pt_BR',
                'translation_file_patterns' => [
                   [
                        'type'     => 'gettext',
                        'base_dir' => __DIR__ . '/../language',
                        'pattern'  => '%s.mo',
                ],
            ],
        ],
        'view_manager' => [
            'display_not_found_reason' => true,
            'display_exceptions'       => true,
            'doctype'                  => 'HTML5',
            'not_found_template'       => 'error/404',
            'exception_template'       => 'error/index',
            'template_map' => [
                'layout/layout'           => __DIR__ . '/../../module/Application/view/layout/layout.phtml',
                'error/404'               => __DIR__ . '/../../module/Application/view/error/404.phtml',
                'error/index'             => __DIR__ . '/../../module/Application/view/error/index.phtml',
            ],
        ]
];
