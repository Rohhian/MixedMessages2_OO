<?php

namespace MixedMessages2;

class Verb {
    private string $tablename = 'verbs';

    public function getTableName(): string {
        return $this->tablename;
    }
}
