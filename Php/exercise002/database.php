<?php 

/*Representação de 1 regstro de banco de dados em forma de classe*/

class DB {
    
    private $db;
    public function __construct() {
        $this->db = new PDO('sqlite:database.sqlite');
    }

    public function livros ($pesquisa = null) {
        if ($pesquisa && trim($pesquisa) !== '') {
            if (is_numeric($pesquisa)) {
                $prepare = $this->db->prepare("select * from livros where id = :id");
                $prepare->bindValue(':id', $pesquisa);
                $prepare->execute();
                $prepare->setFetchMode(PDO::FETCH_CLASS, 'Livro');
                return $prepare->fetchAll();
            }
            else {
            $prepare = $this->db->prepare("select * from livros where (titulo LIKE :texto or descricao LIKE :texto or autor LIKE :texto)");
            $prepare->bindValue(':texto', "%{$pesquisa}%");
            $prepare->execute();
            $prepare->setFetchMode(PDO::FETCH_CLASS, 'Livro');
            return $prepare->fetchAll();
            }
        }
        $prepare = $this->db->prepare("select * from livros");
        $prepare->execute();
        $prepare->setFetchMode(PDO::FETCH_CLASS, 'Livro');
        return $prepare->fetchAll();
        }
        public function livro ($id) {
            $prepare = $this->db -> prepare("select * from livros where id = :id");
            $prepare->bindValue(':id', $id);    
            $prepare->execute();
            $prepare->setFetchMode(PDO::FETCH_CLASS, 'Livro');
            return $prepare->fetch() ?? null;
        }
    }  
?>


