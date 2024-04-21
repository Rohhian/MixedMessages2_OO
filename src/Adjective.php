<?php

namespace MixedMessages2;

class Adjective {
    private string $tablename = 'adjectives';

    public function getTableName(): string {
        return $this->tablename;
    }
}
