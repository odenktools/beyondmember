<?php

namespace Ngakost\BeyondMember\Contracts\Repositories;

/**
 * Interface RoleRepository.
 */
interface RoleRepository extends AbstractRepository
{

    public function create($roleName);
}
