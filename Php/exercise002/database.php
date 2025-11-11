<?php 

/*Representação de 1 regstro de banco de dados em forma de classe*/

class DB {
    
    private $db;
    public function __construct($config) {
        
        if ($config['driver'] === 'mysql') {
            $connectionString = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}";
            $this->db = new PDO($connectionString, $config['username'], $config['password']);
        } else {
            // SQLite
            $connectionString = "sqlite:{$config['database']}";
            $this->db = new PDO($connectionString);
        }

    }

    public function query($query, $class = null, $params = []) {
        $prepare = $this->db->prepare($query);

        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);
        
        return $prepare;
    }

}

$db = new DB($config['database']);
?>


