-- Baozi Store — schema MySQL alinhado ao mapeamento JPA (Spring Boot / Hibernate)
-- Uso: conecte no Beekeeper no banco `baozidb` e execute este script.
-- Nomes de tabela/colunas seguem o padrão do Hibernate (camelCase -> snake_case).

USE baozidb;

-- Cliente: id, nome, clienteDesde -> cliente_desde
CREATE TABLE IF NOT EXISTS cliente (
    id BIGINT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NULL,
    cliente_desde DATE NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Produto: id, nome, preco, estoque
CREATE TABLE IF NOT EXISTS produto (
    id BIGINT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NULL,
    preco DECIMAL(19,2) NULL,
    estoque TINYINT(1) NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Pedido: id, clienteId, produtoId, quantidade
CREATE TABLE IF NOT EXISTS pedido (
    id BIGINT NOT NULL AUTO_INCREMENT,
    cliente_id BIGINT NULL,
    produto_id BIGINT NULL,
    quantidade INT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
