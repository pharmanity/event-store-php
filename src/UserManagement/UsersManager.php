<?php

/**
 * This file is part of prooph/event-store.
 * (c) 2014-2021 Alexander Miertsch <kontakt@codeliner.ws>
 * (c) 2015-2021 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStore\UserManagement;

use Prooph\EventStore\Exception\UserCommandFailed;
use Prooph\EventStore\UserCredentials;

interface UsersManager
{
    public function enable(string $login, ?UserCredentials $userCredentials = null): void;

    public function disable(string $login, ?UserCredentials $userCredentials = null): void;

    /** @throws UserCommandFailed */
    public function deleteUser(string $login, ?UserCredentials $userCredentials = null): void;

    /** @return list<UserDetails> */
    public function listAll(?UserCredentials $userCredentials = null): array;

    public function getCurrentUser(?UserCredentials $userCredentials = null): UserDetails;

    public function getUser(string $login, ?UserCredentials $userCredentials = null): UserDetails;

    /**
     * @param list<string> $groups
     */
    public function createUser(
        string $login,
        string $fullName,
        array $groups,
        string $password,
        ?UserCredentials $userCredentials = null
    ): void;

    /**
     * @param list<string> $groups
     */
    public function updateUser(
        string $login,
        string $fullName,
        array $groups,
        ?UserCredentials $userCredentials = null
    ): void;

    public function changePassword(
        string $login,
        string $oldPassword,
        string $newPassword,
        ?UserCredentials $userCredentials = null
    ): void;

    public function resetPassword(
        string $login,
        string $newPassword,
        ?UserCredentials $userCredentials = null
    ): void;
}
