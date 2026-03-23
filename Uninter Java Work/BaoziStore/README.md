# Baozi Store — API REST (Spring Boot)

API simples para cadastro de **clientes**, **produtos** e **pedidos** (um produto por pedido, com quantidade).

## Requisitos

- Java 17+
- Maven (ou use o Maven embutido em `.maven/apache-maven-3.9.6/`)
- MySQL 8+ (recomendado para o trabalho) **ou** perfil H2 para testes rápidos

## Banco MySQL (Beekeeper / linha de comando)

1. Inicie o serviço MySQL no Windows.
2. Crie o banco (uma vez):

```sql
CREATE DATABASE baozidb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

3. No Beekeeper, crie uma conexão:
   - **Host:** `localhost`
   - **Porta:** `3306`
   - **Usuário / senha:** os da sua instalação (ex.: `root` e a senha que você definiu)
   - **Database:** `baozidb`

4. Configure credenciais **sem colocar senha no Git**:
   - Copie [`application-local.properties.example`](src/main/resources/application-local.properties.example) para `src/main/resources/application-local.properties` e preencha usuário/senha do MySQL (esse arquivo está no `.gitignore`).
   - Alternativa: variáveis de ambiente `MYSQL_USER` e `MYSQL_PASSWORD` (veja [`application-mysql.properties`](src/main/resources/application-mysql.properties)).

5. O perfil padrão é **mysql** (veja [`src/main/resources/application.properties`](src/main/resources/application.properties)). Ao subir a aplicação, o Hibernate cria/atualiza as tabelas (`ddl-auto=update`). Confira no Beekeeper as tabelas `cliente`, `produto`, `pedido`.

### Senha do MySQL (obrigatória na maioria das instalações)

Se ao rodar a API aparecer `Access denied for user 'root'@'localhost' (using password: NO)`, o Spring está tentando conectar **sem senha**. Ajuste em [`application-mysql.properties`](src/main/resources/application-mysql.properties):

```properties
spring.datasource.password=SUA_SENHA_AQUI
```

Ou use variável de ambiente `MYSQL_PASSWORD` (já suportada pelo arquivo).

### Criar tabelas sem subir o Spring (Beekeeper)

Alternativa: com o banco `baozidb` selecionado, execute o script [`sql/01-schema-tabelas-baozidb.sql`](sql/01-schema-tabelas-baozidb.sql) no editor SQL. Ele cria `cliente`, `produto` e `pedido` com colunas compatíveis com o código.

**Observação:** se você criar as tabelas manualmente e depois subir o Spring com `ddl-auto=update`, o Hibernate apenas **ajusta** o que faltar (em geral não duplica tabelas).

## Rodar a API

Na pasta do projeto:

```powershell
.\.maven\apache-maven-3.9.6\bin\mvn.cmd spring-boot:run
```

(Se o `mvn` estiver no PATH, use `mvn spring-boot:run`.)

Base URL padrão: `http://localhost:8080`

### Sem MySQL (H2)

```powershell
.\.maven\apache-maven-3.9.6\bin\mvn.cmd spring-boot:run -Dspring-boot.run.arguments=--spring.profiles.active=h2
```

Console H2: `http://localhost:8080/h2-console` (JDBC URL `jdbc:h2:mem:baozidb`, usuário `sa`, senha vazia).

## Endpoints

| Método | Caminho | Descrição |
|--------|---------|-----------|
| POST | `/clientes` | Criar cliente |
| GET | `/clientes` | Listar |
| GET | `/clientes/{id}` | Buscar por id |
| DELETE | `/clientes/{id}` | Remover |
| PUT | `/clientes/{id}` | Atualizar (opcional) |
| POST | `/produtos` | Criar produto |
| GET | `/produtos` | Listar |
| GET | `/produtos/{id}` | Buscar por id |
| DELETE | `/produtos/{id}` | Remover |
| PUT | `/produtos/{id}` | Atualizar (opcional) |
| POST | `/pedidos` | Criar pedido |
| GET | `/pedidos` | Listar |
| GET | `/pedidos/{id}` | Buscar por id |
| DELETE | `/pedidos/{id}` | Remover |
| PUT | `/pedidos/{id}` | Atualizar (opcional) |

**Pedido:** o corpo deve ter `clienteId`, `produtoId` e `quantidade`. A API recusa pedido se o cliente ou o produto não existirem.

## Fluxo do caso fictício (para o PDF e para o Postman)

1. **Criar cliente** — nome com RU, data de cadastro:

```json
{
  "nome": "Vitor Renan de Almeida - RU 4379411",
  "clienteDesde": "2026-03-23"
}
```

Anote o `id` retornado (ex.: `1`).

2. **Criar produto** — pão de queijo chinês:

```json
{
  "nome": "Pão de queijo chinês",
  "preco": 4.50,
  "estoque": true
}
```

Anote o `id` do produto (ex.: `1`).

3. **Criar pedido** — 10 unidades:

```json
{
  "clienteId": 1,
  "produtoId": 1,
  "quantidade": 10
}
```

4. Faça **GET** em `/clientes`, `/produtos`, `/pedidos` e **GET** por id para os três recursos e **tire os prints** obrigatórios.

## Postman

Importe a collection: [`postman/BaoziStore.postman_collection.json`](postman/BaoziStore.postman_collection.json)  
(File → Import → selecione o arquivo.)

Ajuste a variável `baseUrl` se sua porta for diferente de `8080`.

## Documentação de conformidade

Veja [`CONFORMIDADE.md`](CONFORMIDADE.md).

## Entrega em PDF

Use o roteiro em [`docs/ENTREGA_PDF.md`](docs/ENTREGA_PDF.md) — reescreva os trechos indicados com suas próprias palavras e cole seus prints.
