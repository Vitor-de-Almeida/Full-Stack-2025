<?php 

/*Database record representation as a class*/

class Database {
    
    private $db;
    public function __construct($config) {
        if ($config['driver'] === 'sqlite') {
            $this->db = new PDO($this->getDsn($config));
        } else {
            $this->db = new PDO($this->getDsn($config), username: $config['username'], password: $config['password']);
        }
    }

    private function getDsn($config) {
        $driver = $config['driver'];
        unset($config['driver']);
        $dsn = $driver . ':' . http_build_query($config, '', ';');
        if ($driver === 'sqlite') {
            $dsn = $driver . ':' . $config['database'];
        } else {
            $dsn = $driver . ':' . http_build_query($config, '', ';');
        }
        return $dsn;
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

$db = new Database($config['database']);
?>


