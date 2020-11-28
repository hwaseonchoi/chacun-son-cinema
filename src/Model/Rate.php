<?php

namespace App\Model;

class Rate
{
    public int $count = 0;
    public int $average = 0;
    public int $popularity = 0;

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setAverage(int $average): void
    {
        $this->average = $average;
    }

    /**
     * @return int
     */
    public function getPopularity(): int
    {
        return $this->popularity;
    }

    /**
     * @param int $popularity
     */
    public function setPopularity(int $popularity): void
    {
        $this->popularity = $popularity;
    }
}
