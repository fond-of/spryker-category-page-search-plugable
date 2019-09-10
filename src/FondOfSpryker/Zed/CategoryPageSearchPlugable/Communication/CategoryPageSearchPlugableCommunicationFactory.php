<?php

namespace FondOfSpryker\Zed\CategoryPageSearchPlugable\Communication;

use FondOfSpryker\Zed\CategoryPageSearchPlugable\CategoryPageSearchPlugableDependencyProvider;
use FondOfSpryker\Zed\CategoryPageSearchPlugable\Communication\Plugin\PageMapExpander\CategoryKeyPageMapExpanderPlugin;
use Spryker\Zed\CategoryPageSearch\Communication\CategoryPageSearchCommunicationFactory as SprykerCategoryPageSearchCommunicationFactory;

class CategoryPageSearchPlugableCommunicationFactory extends SprykerCategoryPageSearchCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Zed\CategoryPageSearchPlugable\Dependency\Plugin\CategoryPageMapExpanderInterface[];
     */
    public function getCategoryPageMapExpanderPlugins(): array
    {
        return $this->getProvidedDependency(CategoryPageSearchPlugableDependencyProvider::PLUGIN_COLLECTION_CATEGORY_PAGE_MAP_EXPANDER);
    }
}
