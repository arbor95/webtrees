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

namespace Fisharebest\Webtrees\Module;

use Fisharebest\Webtrees\I18N;

class PedigreeReportModule extends AbstractModule implements ModuleReportInterface
{
    use ModuleReportTrait;

    public function title(): string
    {
        // This text also appears in the .XML file - update both together
        /* I18N: Name of a report */
        return I18N::translate('Pedigree');
    }

    public function description(): string
    {
        // This text also appears in the .XML file - update both together
        /* I18N: Description of the “Pedigree” module */
        return I18N::translate('A report of an individual’s ancestors, formatted as a tree.');
    }
}
