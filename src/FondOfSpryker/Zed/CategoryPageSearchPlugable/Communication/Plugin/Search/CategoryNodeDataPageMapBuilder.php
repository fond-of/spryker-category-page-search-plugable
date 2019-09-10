<?php

namespace FondOfSpryker\Zed\CategoryPageSearchPlugable\Communication\Plugin\Search;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\CategoryPageSearch\Communication\Plugin\Search\CategoryNodeDataPageMapBuilder as SprykerCategoryNodeDataPageMapBuilder;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \FondOfSpryker\Zed\CategoryPageSearchPlugable\Communication\CategoryPageSearchPlugableCommunicationFactory getFactory()
 * @method \Spryker\Zed\CategoryPageSearch\Business\CategoryPageSearchFacadeInterface getFacade()
 */
class CategoryNodeDataPageMapBuilder extends SprykerCategoryNodeDataPageMapBuilder
{
    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $categoryData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function buildPageMap(PageMapBuilderInterface $pageMapBuilder, array $categoryData, LocaleTransfer $localeTransfer)
    {
        $pageMapTransfer = parent::buildPageMap($pageMapBuilder, $categoryData, $localeTransfer);

        $this->expandCategoryPageMap($pageMapTransfer, $pageMapBuilder, $categoryData, $localeTransfer);

        return $pageMapTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $categoryData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    protected function expandCategoryPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $categoryData, LocaleTransfer $localeTransfer): PageMapTransfer
    {
        foreach ($this->getFactory()->getCategoryPageMapExpanderPlugins() as $categoryPageMapExpanderPlugin) {
            $pageMapTransfer = $categoryPageMapExpanderPlugin->expandCategoryPageMap($pageMapTransfer, $pageMapBuilder, $categoryData, $localeTransfer);
        }

        return $pageMapTransfer;
    }
}
