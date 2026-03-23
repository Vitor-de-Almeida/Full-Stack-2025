# Roteiro para o PDF da disciplina

Use este arquivo como **esqueleto**. Troque os trechos entre colchetes por texto **seu** (experiência real de instalação, erros que apareceram, horário em que testou). Isso deixa o trabalho com cara de autoria própria.

---

## Capa

- Nome completo  
- Disciplina: Desenvolvimento Web Back-End  
- Título: API REST — Baozi Store  
- Data  

---

## 1. Estudo de caso (situação fictícia)

**[Escreva 2–3 parágrafos no seu estilo.]**  
Sugestão de conteúdo (não copie de internet):

- A Baozi Store vende pães chineses artesanais e precisava organizar clientes, produtos e pedidos.
- O cliente **[seu nome completo – RU 4379411]** se cadastrou em **[data que você usou no JSON]**.
- O produto principal é o **pão de queijo chinês**, vendido por unidade.
- Esse cliente fez um pedido de **10 unidades**; o sistema registrou cliente, produto e quantidade.

Mencione em uma frase **por que** isso ajuda a loja (ex.: controle de pedidos, histórico).

---

## 2. Tecnologias e arquitetura

Liste o que você usou de fato:

- Java [versão do seu JDK]  
- Spring Boot  
- Spring Data JPA  
- MySQL [versão, se souber] + Beekeeper para consultar dados  
- Postman para testar a API  

Explique em **suas palavras** o MVC mínimo do projeto:

- **Model:** entidades `Cliente`, `Produto`, `Pedido`  
- **Repository:** interfaces JPA  
- **Controller:** REST com JSON  

**[Opcional honesto]:** Se algo te confundiu (ex.: perfil MySQL vs H2), descreva em 2–3 linhas como resolveu.

---

## 3. Modelo de dados (DER simplificado)

Inclua um diagrama simples (pode ser desenhado no Word, Draw.io ou papel escaneado):

- `Cliente` (1) — (N) `Pedido`  
- `Produto` (1) — (N) `Pedido`  

No seu código, o pedido guarda `clienteId` e `produtoId`; explique isso em uma frase para o professor.

---

## 4. Diagrama de caso de uso

Inclua um diagrama com atores sugeridos:

- **Cliente** (ou “Usuário da API / operador da loja”)  
- **Sistema Baozi Store**  

Casos de uso: cadastrar cliente, cadastrar produto, registrar pedido, listar e consultar por id.

---

## 5. Como você configurou o MySQL

**[Preencha com o que você fez na sua máquina.]**

- Comando ou tela do Beekeeper onde criou o banco `baozidb`  
- Usuário que usou (ex.: `root`) — **não coloque senha no PDF** se for sensível; diga só “senha local configurada em `application-mysql.properties`”  
- Print opcional do Beekeeper mostrando as tabelas após subir a API  

---

## 6. Testes com Postman (prints obrigatórios)

Para cada print, coloque **legenda**: o que a requisição faz e o status HTTP (201, 200, etc.).

Ordem sugerida (igual ao fluxo do trabalho):

1. Criar cliente  
2. Criar produto  
3. Criar pedido (10 unidades, usando os ids retornados)  
4. Listagem geral: três prints ou um print por aba — **GET** `/clientes`, `/produtos`, `/pedidos`  
5. Consulta por ID: **GET** `/clientes/{id}`, `/produtos/{id}`, `/pedidos/{id}`  

**Dica:** deixe visível no print a URL, método, body (se houver) e o JSON de resposta.

---

## 7. Problemas que apareceram e como você resolveu

**[Obrigatório para não parecer genérico.]**  
Escreva 2–3 itens, por exemplo:

- Erro de conexão com MySQL (porta, senha, banco não criado)  
- Pedido retornando erro porque faltou criar cliente/produto antes  
- Porta 8080 ocupada — o que você fez (mudou porta ou encerrou o processo)  

---

## 8. Conclusão

**[2–4 frases suas]** sobre o que você aprendeu ao montar a API e testar no Postman.

---

### Checklist antes de entregar

- [ ] PDF com todos os prints pedidos pelo professor  
- [ ] Nome + RU no texto do estudo de caso  
- [ ] Diagrama de caso de uso  
- [ ] DER ou explicação do modelo  
