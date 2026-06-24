<?php

declare(strict_types=1);

/*
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace GeorgRinger\News\Domain\Factory;

use GeorgRinger\News\Domain\Model\Dto\NewsDemand;

/**
 * Builds a {@see NewsDemand} from a plugin/TypoScript settings array.
 *
 * Extracted from {@see \GeorgRinger\News\Controller\NewsController} so the
 * same "settings -> demand" logic is reusable outside the request
 * lifecycle (CLI, scheduler, search indexers, sitemap/record APIs)
 * without instantiating the controller.
 */
interface DemandFactoryInterface
{
    /**
     * @param array $settings Plugin/TypoScript settings (flexform-merged)
     * @param class-string<NewsDemand> $class Demand class to build; may be overridden by $settings['demandClass']
     */
    public function createDemandObjectFromSettings(array $settings, string $class = NewsDemand::class): NewsDemand;
}