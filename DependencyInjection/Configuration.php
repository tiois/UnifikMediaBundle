<?php

namespace Egzakt\MediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('egzakt_media');

        $this->addParameters($rootNode);
        return $treeBuilder;
    }

    /**
     * addParameters
     *
     * @param ArrayNodeDefinition $rootNode
     */
    private function addParameters(ArrayNodeDefinition $rootNode)
    {
        $rootNode
            ->children()
                ->integerNode('resultPerPage')
                    ->defaultValue(2)
                    ->min(1)
                    ->max(100)
                    ->info("Number of items displayed per page.")
                ->end()
            ->end();
    }
}
