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

namespace Fisharebest\Webtrees\Census;

/**
 * Definitions for a census
 */
class CensusOfDeutschland extends Census implements CensusPlaceInterface
{
    /**
     * All available censuses for this census place.
     *
     * @return array<CensusInterface>
     */
    public function allCensusDates(): array
    {
        return [
            new CensusOfDeutschland1819(),
            new CensusOfDeutschland1867(),
            new CensusOfDeutschlandNL1867(),
            new CensusOfDeutschland1900(),
            new CensusOfDeutschland1919(),
        ];
    }

    /**
     * Where did this census occur, in GEDCOM format.
     *
     * @return string
     */
    public function censusPlace(): string
    {
        return 'Deutschland';
    }

    /**
     * In which language was this census written.
     *
     * @return string
     */
    public function censusLanguage(): string
    {
        return 'de';
    }
}
