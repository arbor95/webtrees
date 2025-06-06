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
class CensusOfScotland1841 extends CensusOfScotland implements CensusInterface
{
    /**
     * When did this census occur.
     *
     * @return string
     */
    public function censusDate(): string
    {
        return '06 JUN 1841';
    }

    /**
     * The columns of the census.
     *
     * @return array<CensusColumnInterface>
     */
    public function columns(): array
    {
        return [
            new CensusColumnFullName($this, 'Name', 'Name'),
            new CensusColumnAgeMale5Years($this, 'AgeM', 'Age (males)'),
            new CensusColumnAgeFemale5Years($this, 'AgeF', 'Age (females)'),
            new CensusColumnOccupation($this, 'Occupation', 'Profession, trade, employment or of independent means'),
            new CensusColumnNull($this, 'BiC', 'Born in same county'),
            new CensusColumnBornForeignParts($this, 'EIF', 'Born in England, Ireland or foreign parts'),
        ];
    }
}
