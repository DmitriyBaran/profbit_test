<?php
namespace App\Service;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

class ProductService
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws Exception
     */
    public function getProductInfo(): array
    {
        $sql = "SELECT
            IFNULL(code, 'all') AS code,
            COUNT(code) AS total_quantity,
            SUM(price) AS total_price,
            IFNULL(type, code) AS type
        FROM
            product
        GROUP BY
            code,
            type WITH ROLLUP
        ORDER BY
            code,
            total_quantity DESC";

        $stmt = $this->connection->prepare($sql);
        return  $stmt->executeQuery()->fetchAllAssociative();
    }
}