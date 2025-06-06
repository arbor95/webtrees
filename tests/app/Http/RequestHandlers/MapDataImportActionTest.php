<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2025 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Fisharebest\Webtrees\Http\RequestHandlers;

use Fig\Http\Message\RequestMethodInterface;
use Fig\Http\Message\StatusCodeInterface;
use Fisharebest\Webtrees\TestCase;
use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\Attributes\CoversClass;

use function dirname;

#[CoversClass(MapDataImportAction::class)]
class MapDataImportActionTest extends TestCase
{
    protected static bool $uses_database = true;

    public function testImportAction(): void
    {
        $csv              = $this->createUploadedFile(dirname(__DIR__, 3) . '/data/places.csv', 'text/csv');
        $handler          = new MapDataImportAction(new Psr17Factory());
        $request          = self::createRequest(RequestMethodInterface::METHOD_POST, [], ['options' => 'add', 'source' => 'client'], ['localfile' => $csv]);
        $response         = $handler->handle($request);

        self::assertSame(StatusCodeInterface::STATUS_FOUND, $response->getStatusCode());
    }
}
