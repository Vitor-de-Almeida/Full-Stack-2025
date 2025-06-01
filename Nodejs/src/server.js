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

const server = http.createServer((require,response) => {
    const {method, url} = require

    if (method === 'GET' && url === '/users') {
        return response.end('Listagem de usuários')
    }

    if (method === 'POST' && url === '/users') {
        return response.end('Criação de usuário')
    }


    return response.end('Hello Baby')
})

server.listen(3333)