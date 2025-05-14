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
        for ($i = 0; $i < strlen($key); $i++) {
            $hash = ($hash * 31 + ord($key[$i])) % $this->size;
        }
        return $hash;
    }

    public function add(string $key): void
    {
        $index = $this->hashCode($key);

        foreach ($this->table[$index] as $existingKey) {
            if ($existingKey === $key) {
                return; // Already exists
            }
        }

        $this->table[$index][] = $key;
    }

    public function contains(string $key): bool
    {
        $index = $this->hashCode($key);
        foreach ($this->table[$index] as $existingKey) {
            if ($existingKey === $key) {
                return true;
            }
        }
        return false;
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

    public function values(): array
    {
        return array_merge(...$this->table);
    }
}