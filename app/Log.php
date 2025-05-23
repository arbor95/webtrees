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

namespace Fisharebest\Webtrees;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Record webtrees events in the database
 */
class Log
{
    // We can log the following types of message in the wt_log table.
    private const string TYPE_AUTHENTICATION = 'auth';
    private const string TYPE_CONFIGURATION  = 'config';
    private const string TYPE_EDIT           = 'edit';
    private const string TYPE_ERROR          = 'error';
    private const string TYPE_MEDIA          = 'media';
    private const string TYPE_SEARCH         = 'search';

    /**
     * Store an authentication message in the message log.
     *
     * @param string $message
     *
     * @return void
     */
    public static function addAuthenticationLog(string $message): void
    {
        self::addLog($message, self::TYPE_AUTHENTICATION);
    }

    /**
     * Store a new message (of the appropriate type) in the message log.
     *
     * @param string    $message
     * @param string    $log_type
     * @param Tree|null $tree
     *
     * @return void
     */
    private static function addLog(string $message, string $log_type, Tree|null $tree = null): void
    {
        if (Registry::container()->has(ServerRequestInterface::class)) {
            $request    = Registry::container()->get(ServerRequestInterface::class);
            $ip_address = Validator::attributes($request)->string('client-ip');
        } else {
            $ip_address = '127.0.0.1';
        }

        DB::table('log')->insert([
            'log_type'    => $log_type,
            'log_message' => $message,
            'ip_address'  => $ip_address,
            'user_id'     => Auth::id(),
            'gedcom_id'   => $tree?->id(),
        ]);
    }

    /**
     * Store a configuration message in the message log.
     *
     * @param string    $message
     * @param Tree|null $tree
     *
     * @return void
     */
    public static function addConfigurationLog(string $message, Tree|null $tree = null): void
    {
        self::addLog($message, self::TYPE_CONFIGURATION, $tree);
    }

    /**
     * Store an edit message in the message log.
     *
     * @param string $message
     * @param Tree   $tree
     *
     * @return void
     */
    public static function addEditLog(string $message, Tree $tree): void
    {
        self::addLog($message, self::TYPE_EDIT, $tree);
    }

    /**
     * Store an error message in the message log.
     *
     * @param string $message
     *
     * @return void
     */
    public static function addErrorLog(string $message): void
    {
        self::addLog($message, self::TYPE_ERROR);
    }

    /**
     * Store an media management message in the message log.
     *
     * @param string $message
     *
     * @return void
     */
    public static function addMediaLog(string $message): void
    {
        self::addLog($message, self::TYPE_MEDIA);
    }

    /**
     * Store a search event in the message log.
     * Unlike most webtrees activity, search is not restricted to a single tree,
     * so we need to record which trees were searched.
     *
     * @param string      $message
     * @param array<Tree> $trees Which trees were searched
     *
     * @return void
     */
    public static function addSearchLog(string $message, array $trees): void
    {
        foreach ($trees as $tree) {
            self::addLog($message, self::TYPE_SEARCH, $tree);
        }
    }
}
