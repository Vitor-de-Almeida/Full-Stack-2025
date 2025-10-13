export const tickets = [
    {
        method: "POST",
        path:"/tickets",
        controller: (request, response) => {
            return response.end("Criado com sucesso!")
        }
    }
]