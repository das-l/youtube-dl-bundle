<?php

declare(strict_types=1);

/*
 * This file is part of the Das L YouTube DL Bundle.
 *
 * (c) Das L – Alex Wuttke Software & Media
 *
 * @license MIT
 */

namespace DasL\YoutubeDlBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('das_l_youtube_dl');
        $treeBuilder
            ->getRootNode()
            ->children()
                ->scalarNode('binPath')
                    ->defaultNull()
                ->end()
                ->scalarNode('pythonPath')
                    ->defaultNull()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
