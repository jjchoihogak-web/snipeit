<?php

namespace App\Policies;

class ConsumablePolicy extends CheckoutablePermissionsPolicy
{
    protected function columnName()
    {
        return 'consumables';
    }

    public function update_stock(User $user, $item = null)
    {
        return $user->hasAccess($this->columnName().'.update_stock');
    }
}
