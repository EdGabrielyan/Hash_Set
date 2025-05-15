<?php

class HashSet
{
    private array $table;
    private int $size;

    public function __construct(int $size = 13)
    {
        $this->size = $size;
        $this->table = array_fill(0, $size, []);
    }

    private function hashCode(string $key): int
    {
        $hash = 0;
        $prime = 31;

        for ($i = 0; $i < strlen($key); $i++) {
            $hash = ($hash * $prime + ord($key[$i])) % $this->size;
        }
        return $hash;
    }

    public function set(string $key): void
    {
        $index = $this->hashCode($key);

        foreach ($this->table[$index] as $existingKey) {
            if ($existingKey === $key) {
                return;
            }
        }

        $this->table[$index][] = $key;
    }

    public function get(): array
    {
        return array_merge(...$this->table);
    }

    public function remove(string $key): void
    {
        $index = $this->hashCode($key);
        foreach ($this->table[$index] as $i => $existingKey) {
            if ($existingKey === $key) {
                array_splice($this->table[$index], $i, 1);
                return;
            }
        }
    }

    public function has(string $key): bool
    {
        $index = $this->hashCode($key);
        foreach ($this->table[$index] as $existingKey) {
            if ($existingKey === $key) {
                return true;
            }
        }
        return false;
    }

}