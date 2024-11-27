<?php

namespace Src\Application\Helpers;

use Src\Infrastructure\Databases\DatabaseConnection;

class Helpers
{
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public static function env($key, $default = null)
    {
        return isset($_ENV[$key]) ? $_ENV[$key] : $default;
    }

    /**
     * Checks if a foreign key value exists in a specified table column.
     *
     * @param string $table
     * @param string $column
     * @param int|null $value
     * @return bool
     */
    public static function foreignKeyExists(string $table, string $column, ?int $value): bool
    {
        if (is_null($value)) {
            return true;
        }

        $db = DatabaseConnection::getConnection();
        $sql = "SELECT COUNT(*) FROM $table WHERE $column = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$value]);

        return $stmt->fetchColumn() > 0;
    }
}
