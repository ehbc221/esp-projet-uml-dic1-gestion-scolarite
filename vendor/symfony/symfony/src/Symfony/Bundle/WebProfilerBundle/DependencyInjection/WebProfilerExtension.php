<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\WebProfilerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener;

/**
 * WebProfilerExtension.
 *
 * Usage:
 *
 *     <webprofiler:config
 *        toolbar="true"
 *        intercept-redirects="true"
 *     />
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class WebProfilerExtension extends Extension
{
    /**
     * Loads the web profiler configuration.
     *
     * @param array            $configs   An array of configuration settings
     * @param ContainerBuilder $container A ContainerBuilder instance
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('profiler.xml');
        $container->setParameter('web_profiler.debug_toolbar.position', $config['position']);

        if ($config['toolbar'] || $config['intercept_redirects']) {
            $loader->load('toolbar.xml');
            $container->getDefinition('web_profiler.debug_toolbar')->replaceArgument(5, $config['excluded_ajax_paths']);
            $container->setParameter('web_profiler.debug_toolbar.intercept_redirects', $config['intercept_redirects']);
            $container->setParameter('web_profiler.debug_toolbar.mode', $config['toolbar'] ? WebDebugToolbarListener::ENABLED : WebDebugToolbarListener::DISABLED);
        }

        $baseDir = array();
        $rootDir = $container->getParameter('kernel.root_dir');
        $rootDir = explode(DIRECTORY_SEPARATOR, realpath($rootDir) ?: $rootDir);
        $bundleDir = explode(DIRECTORY_SEPARATOR, __DIR__);
        for ($i = 0; isset($rootDir[$i], $bundleDir[$i]); ++$i) {
            if ($rootDir[$i] !== $bundleDir[$i]) {
                break;
            }
            $baseDir[] = $rootDir[$i];
        }
        $baseDir = implode(DIRECTORY_SEPARATOR, $baseDir);

        $profilerController = $container->getDefinition('web_profiler.controller.profiler');
        $profilerController->replaceArgument(6, $baseDir);

        $fileLinkFormatter = $container->getDefinition('debug.file_link_formatter');
        $fileLinkFormatter->replaceArgument(2, $baseDir);
    }

    /**
     * Returns the base path for the XSD files.
     *
     * @return string The XSD base path
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/schema';
    }

    public function getNamespace()
    {
        return 'http://symfony.com/schema/dic/webprofiler';
    }
}
