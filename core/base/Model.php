<?php


namespace core\base;


use app\models\Product;
use core\Db;

abstract class Model
{
    protected $attributes = [];
    protected $errors = [];
    protected $rules = [];

    /** @var \PDO */
    protected $db;

    protected $query;
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
                    $where .= ' WHERE ' . $whereConditions;
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

    public function select(array $fields = [])
    {
        $fieldsToQuery = '';
        if (!empty($fields)) {

            foreach ($fields as $field) {
                $fieldsToQuery .= '`' . $field . '`';
            }

        } else {
            $fieldsToQuery .= '`*`';
        }

        $query = 'SELECT ' . $fieldsToQuery . ' FROM `' . $this->getTableName() . '`';
        $this->query = $query;
        return $this;

    }

    public function where($conditions)
    {
        if (!empty($conditions) && $conditions !== '') {
            $whereClause = '';

            if (is_array($conditions)) {

                foreach ($conditions as $condition) {
                    $condition[0] = '`' . $condition[0] . '`';
                    $condition[2] = '\'' . $condition[2] . '\'';
                    $condition = implode(' ', $condition);
                    $whereClause .= $condition . ' AND ';
                }

                $whereClause = substr($whereClause, 0, -5);

            } elseif (is_string($conditions)) {
                $whereClause .= $conditions;
            }

            $query = $this->query . ' WHERE ' . $whereClause;
            $this->query = $query;
            return $this;
        }

        return $this;

    }

    public function order(string $orderField)
    {
        $this->query .= ' ORDER BY ' . $orderField;
        return $this;
    }

    public function limit(int $limit)
    {
        $this->query .= ' LIMIT ' . $limit;
        return $this;
    }

    public function offset(int $offset)
    {
        if (!(strpos($this->query, 'LIMIT') === false)) {
            $this->query .= ' OFFSET ' . $offset;
            return $this;
        }
        throw new \Exception('The query ' . $this->query . ' must contain a limit');
    }

    public function get($mode = false)
    {
        $result = $this->db->query($this->query);

        if (!$result) {
            return $this->getQuery();
        }

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $result->fetchAll();

        if ($mode) {
            return $result;
        }

        $entities = [];

        foreach ($result as $item) {
            $entities[] = $this->morph($item);
        }

        return $entities;
    }

    public function getOne($mode = false)
    {
        if (!(strpos($this->query, 'LIMIT') === false)) {
            return $this->getQuery();
        }

        $this->query .= ' LIMIT 1';

        $result = $this->db->query($this->query);

        if (!$result) {
            return $this->getQuery();
        }

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $result->fetch();

        if (!$result) {
            throw new \Exception('Not found');
        }

        if ($mode) {
            return $result;
        }

        return $this->morph($result);
    }

    public function getQuery()
    {
        return $this->query;
    }

}