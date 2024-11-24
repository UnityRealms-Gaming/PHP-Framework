<?php

namespace App\Migrations;

use App\Core\Database;
class Migration_2024_11_23_create_licenses_table
{
    public function up()
    {
        $pdo = \App\Core\Database::connect();
        $pdo->exec("
      CREATE TABLE licenses (
                id INT AUTO_INCREMENT PRIMARY KEY,
                license_key VARCHAR(255) UNIQUE NOT NULL,
                user_id INT NOT NULL,
                product_id INT NOT NULL,
                valid_until DATE NOT NULL,
                status ENUM('active', 'expired', 'revoked') DEFAULT 'active',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )
        ");
    }

    public function down()
    {
        $pdo = \App\Core\Database::connect();
        $pdo->exec("DROP TABLE IF EXISTS licenses");
    }
}
