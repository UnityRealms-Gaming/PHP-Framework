<?php

class Migration_2024_11_23_create_users_table
{
    public function up()
    {
        $pdo = \App\Core\Database::connect();
        $pdo->exec("
            CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    }

    public function down()
    {
        $pdo = \App\Core\Database::connect();
        $pdo->exec("DROP TABLE IF EXISTS users");
    }
}
