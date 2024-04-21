<?php

namespace MixedMessages2;

class Who {
    private string $tablename = 'who';

    public function getTableName(): string {
        return $this->tablename;
    }
}
