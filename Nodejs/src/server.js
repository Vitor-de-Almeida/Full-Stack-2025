import http from 'http'

// - Criar Usuários
// - Listagem de Usuários
// - Edição de Usuários

// - HTTP
// - Método HTTP
// - URL

// GET, POST, PUT, PATCH, DELETE - Métodos mais utilizados (mais semânticos do que funcionais)
// GET => Buscar uma informação no back-end
// POST => Criar uma informação no back-end
// PUT => Atualizar um recurso no back-end
// PATCH => Atualizar uma informação específica de um recurso no back-end
// DELETE => Deletar um recurso do back-end

// GET /users => Buscando usuários no back-end
// POST /users => Criar um usuário no back-end

// JSON - JavaScript Object Notation

//Cabeçalhos (Requisição/reposta) => Metadados

//HTTP Status Code

const users = []

const server = http.createServer((request,response) => {
    const {method, url} = request

    if (method === 'GET' && url === '/users') {
        return response
        .setHeader('Content-type', 'application/json')
        .end(JSON.stringify(users))
    }

    if (method === 'POST' && url === '/users') {
        users.push({
            id: 1,
            name:'John Doe',
            email: 'johndoe@example.com'
        })
        return response.writeHead(201).end()
    }


    return response.writeHead(404).end('Not found')
})

server.listen(3333)