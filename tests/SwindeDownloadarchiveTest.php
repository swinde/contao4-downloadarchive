<?php

declare(strict_types=1);

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Swinde\Downloadarchive\Tests;

use Swinde\Downloadarchive\SwindeDownloadarchive;
use PHPUnit\Framework\TestCase;
use Swinde\Downloadarchive\DownloadarchiveModel;

class ContaoSkeletonBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new Downloadarchive();

        $this->assertInstanceOf('Swinde\Downloadarchive\SwindeDownloadarchive', $bundle);
    }
}
