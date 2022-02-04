<?php

declare(strict_types=1);

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\SkeletonBundle\Tests;

use Swinde\Downloadarchive\SwindeDownloadarchive;
use PHPUnit\Framework\TestCase;

class SwindeDownloadarchiveTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new SwindeDownloadarchive();

        $this->assertInstanceOf('Swinde\Downloadarchive\SwindeDownloadarchive', $bundle);
    }
}
