<?php

namespace FondOfSpryker\Zed\CategoryPageSearchPlugable;

use Spryker\Zed\CategoryPageSearch\CategoryPageSearchDependencyProvider as SprykerCategoryPageSearchDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CategoryPageSearchPlugableDependencyProvider extends SprykerCategoryPageSearchDependencyProvider
{
    public const PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER = 'PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        parent::provideCommunicationLayerDependencies($container);

        $container = $this->addCategoryPageMapExpanderPlugin($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCategoryPageMapExpanderPlugin(Container $container): Container
    {
        $container[static::PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER] = function () {
            return $this->createCategoryPageMapExpanderPlugin();
        };

        return $container;
    }

    /**
     * @return \FondOfSpryker\Zed\CategoryPageSearchPlugable\Dependency\Plugin\CategoryPageMapExpanderInterface[]
     */
    protected function createCategoryPageMapExpanderPlugin(): array
    {
        return [];
    }
}
