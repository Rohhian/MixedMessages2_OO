<?php

namespace MixedMessages2;

class Noun {
    private string $tablename = 'nouns';

    public function getTableName(): string {
        return $this->tablename;
    }
}
