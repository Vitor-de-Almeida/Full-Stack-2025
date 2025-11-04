<?php 

/*Representação de 1 regstro de banco de dados em forma de classe*/

class DB {
    
    private $db;
    public function __construct() {
        $this->db = new PDO('sqlite:database.sqlite');
    }

    public function livros ($pesquisa = null) {
        if ($pesquisa && trim($pesquisa) !== '') {
            $sql = "select * from livros where usuario_id = 1 and titulo like '%$pesquisa%'";
            echo $sql . "<br>"; 
            $query = $this->db->query($sql);
        } else {
            $query = $this->db->query("select * from livros");
        }
        
        $items = $query->fetchAll();
        return array_map(fn($item) => Livro::make($item), $items);
    }
    public function livro ($id) {
        $query = $this->db -> query("select * from livros where id = $id");
        $item = $query->fetch();
        if (!$item) {
            return null;
        }
        return Livro::make($item);
    }
}

?>
