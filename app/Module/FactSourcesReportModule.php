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

use Fisharebest\Webtrees\Auth;
use Fisharebest\Webtrees\I18N;

class FactSourcesReportModule extends AbstractModule implements ModuleReportInterface
{
    use ModuleReportTrait;

    /** @var int The default access level for this module.  It can be changed in the control panel. */
    protected int $access_level = Auth::PRIV_USER;

    public function title(): string
    {
        // This text also appears in the .XML file - update both together
        /* I18N: Name of a module/report */
        return I18N::translate('Source');
    }

    public function description(): string
    {
        // This text also appears in the .XML file - update both together
        /* I18N: Description of the “Source” module */
        return I18N::translate('A report of the information provided by a source.');
    }
}
