# Extend Spryker Category-Page-Search Module
[![Build Status](https://travis-ci.org/fond-of/spryker-category.svg?branch=master)](https://travis-ci.org/fond-of/category-extend-page-search)
[![PHP from Travis config](https://img.shields.io/travis/php-v/symfony/symfony.svg)](https://php.net/)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages/fond-of-spryker/category-extend-page-search)

Extend Spryker Category-Page-Search Module, inject plugins to extend PageMap.

## Installation

```
composer require fond-of-spryker/category-page-search-plugable
```

After that register the new CategoryNodeDataPageMapBuilder into your SearchDependencyProvider

```
protected function getSearchPageMapPlugins()
{
    return [
        // ...
        new CategoryNodeDataPageMapBuilder(),
        // ...
    ];
}
