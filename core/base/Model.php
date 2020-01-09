<?php


namespace core\base;


use core\Db;

abstract class Model
{
    protected $attributes = [];
    protected $errors = [];
    protected $rules = [];
    protected $db;
    protected $table;

    public function __construct()
    {
        $db = Db::instance();
        $this->db = $db->connection;
    }

    public function getTableName(): string
    {
        if ($this->table && is_string($this->table)) {
            return $this->table;
        }

        $class = new \ReflectionClass($this);
        return strtolower($class->getShortName()) . 's';
    }

    public function save()
    {
        $class = new \ReflectionClass($this);
        $propsToImplode = [];


        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyName = $property->getName();
            if ($this->{$propertyName}) {
                $propsToImplode[] = '`' . $propertyName . '` = "' . $this->{$propertyName} . '"';
            }
        }

        $setClause = implode(',',$propsToImplode);
        $sql = '';

        if ($this->id) {
            $sql = 'UPDATE `' . $this->getTableName() . '` SET ' . $setClause . ' WHERE id = ' . $this->id;
        } else {
            $sql = 'INSERT INTO `' . $this->getTableName() . '` SET ' . $setClause;
        }
        return $this->db->prepare($sql)->execute();
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM `' . $this->getTableName() . '` WHERE id = ' . $id;
        return $this->db->prepare($sql)->execute();
    }

    public function morph(array $object)
    {
        $class = new \ReflectionClass($this);

        $entity = $class->newInstance();

        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            if (isset($object[$property->getName()])) {
                $property->setValue($entity, $object[$property->getName()]);
            }
        }

        return $entity;
    }

    public function find($options = []): array
    {
        $where = [];
        $result = [];
        $query = 'SELECT * FROM `' . $this->getTableName() . '`';

        $whereClause = '';
        if (isset($options['conditions'])) {
            $whereConditions = $options['conditions'];
            if (!empty($whereConditions)) {
                if (is_array($whereConditions)) {
                    foreach ($whereConditions as $key => $value) {
                        $where[] = '`' . $key . '` = "' . $value . '"';
                    }
                    $whereClause = ' WHERE ' . implode(' AND ', $where);
                } elseif (is_string($whereConditions)) {
                    $where .= ' WHERE ' . $options;
                } else {
                    throw new \Exception('Wrong parameter type of options');
                }
            }
            $query .= $whereClause;
        }

        if (isset($options['order'])) {
            $order = $options['order'];
            $query .= ' ORDER BY ' . $order;
        }

        if (isset($options['limit'])) {
            $limit = $options['limit'];
            $query .= ' LIMIT ' . $limit;

            if (isset($options['offset'])) {
                $offset = $options['offset'];
                $query .= ' OFFSET ' . $offset;
            }
        }
        $raw = $this->db->query($query);
        if ($raw) {
            foreach ($raw as $rawRow) {
                $result[] = $this->morph($rawRow);
            }

        }
        return $result;
    }

    public function findOne(int $id)
    {
        $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE id = ' . $id;
        $raw = $this->db->query($sql);
        $raw->setFetchMode(\PDO::FETCH_ASSOC);
        $raw = $raw->fetch();
        if ($raw) {
            $result = $this->morph($raw);
            return $result;
        }
        return false;
    }

}