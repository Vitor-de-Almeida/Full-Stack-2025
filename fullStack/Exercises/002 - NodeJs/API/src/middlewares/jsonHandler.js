export async function jsonBodyHandler (request,response) {
    const buffers = []

    //Coleta os chuncks de dados da requisição.
    for await (const chuncks of request) {
        buffers.push(chuncks)
    }

    try {
        //Concatenar os chunck e converter para string. Em seguida, converte a string para JSON.
        request.body = JSON.parse(Buffer.concat(buffers).toString())
    } catch (error) {
        request.body = null
        console.log("Não há requisições a serem recebidas")
    }

    response.setHeader("Content-Type", "application/json")
}