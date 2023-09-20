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
];
