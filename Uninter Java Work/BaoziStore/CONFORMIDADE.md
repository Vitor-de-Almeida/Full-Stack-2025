# Conformidade com o enunciado (Baozi Store)

## Requisitos técnicos

| Requisito | Status |
|-----------|--------|
| Java | OK (Java 17 no `pom.xml`) |
| Spring Boot | OK |
| Spring Data JPA | OK |
| Banco relacional | OK — MySQL via perfil `mysql` (H2 opcional com perfil `h2`) |
| JSON nos endpoints | OK (`@RestController`, serialização Jackson) |
| Pacotes `model`, `repository`, `controller` | OK |

## Entidades obrigatórias

| Entidade | Campos exigidos | Status |
|----------|-----------------|--------|
| Produto | id, nome, preco, estoque | OK |
| Cliente | id, nome, clienteDesde | OK |
| Pedido | id, clienteId, produtoId, quantidade | OK |

Observação: o `Pedido` usa IDs (`clienteId`, `produtoId`), como permitido pelo enunciado. Na criação (`POST /pedidos`), a API valida se cliente e produto existem.

## Endpoints REST obrigatórios

Para cada recurso (`/clientes`, `/produtos`, `/pedidos`):

| Método | Rota | Status |
|--------|------|--------|
| POST | base | OK (201 Created) |
| GET | base | OK (lista) |
| GET | `/{id}` | OK (404 se não existir) |
| DELETE | `/{id}` | OK (204 ou 404) |

Endpoints opcionais: `PUT /{id}` implementado nas três entidades.

## Pontos fora do mínimo (aceitável na rubrica)

- Não há camada `service`: o MVC mínimo pedido costuma ser **Model + Repository + Controller**; regras extras de pedido ficam no controller.
- Diagrama de caso de uso e PDF são responsabilidade da entrega documental (ver `docs/ENTREGA_PDF.md`).

## Caso fictício da avaliação (dados para teste)

- Cliente: **Vitor Renan de Almeida – RU 4379411**
- Produto: **pão de queijo chinês**
- Pedido: **10 unidades**

Use os corpos JSON sugeridos no `README.md` e na collection do Postman.
