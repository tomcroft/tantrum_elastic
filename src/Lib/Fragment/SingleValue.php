<?php

namespace tantrum_elastic\Lib\Fragment;

use tantrum_elastic\Lib\Element;

trait SingleValue
{
    /**
     * A single field value
     * @var mixed
     */
    protected $value;

    /**
     * Set the value for this object
     * @param  mixed
     * @return Element
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
