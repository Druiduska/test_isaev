<?php

namespace App\Dto\Traits;

trait ToArrayTrait
{
    protected ?array $keyList = null;
    protected ?array $dtoPropertyKeys = null;

    /**
     * Возвращает именованный массив из всех публичных параметров класса
     *
     * @return array
     */
    public function toArray(): array
    {
        if (isset($this->keyList)) {
            return array_intersect_key(
                $this->getDtoPropertyList(),
                array_fill_keys($this->keyList, null)
            );
        }

        $result = array_filter($this->getDtoPropertyList()) ?? [];

        return $result;
    }

    /**
     * @return array|null
     */
    protected function getDtoPropertyList()
    {
        if (isset($this->dtoPropertyKeys)) {
            return $this->dtoPropertyKeys;
        }
        $result = [];
        $reflector = new \ReflectionClass(get_class($this));
        $dtoProperties = $reflector->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($dtoProperties as $prop) {
            $key = $prop->getName();
            if ($prop->isPublic()) {
                $result[$key] = $this->{$prop->name};
            }
        }
        return $this->dtoPropertyKeys = $result;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setKeyList(array $data)
    {
        $this->keyList = array_intersect(
            $data,
            array_keys($this->getDtoPropertyList())
        );
        return $this;
    }
}
