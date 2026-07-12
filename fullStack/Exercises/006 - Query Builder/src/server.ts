import express, { Request, Response } from "express"
import { knex } from "./database/knex"

const app = express()
app.use(express.json())

app.get("/courses", async (request: Request, response: Response) => {
  //const courses = await knex.raw("SELECT * FROM courses")

  const courses = await knex("courses").select().orderBy("name", "asc")

  return response.status(200).json(courses)
})

app.post("/courses", async (request: Request, response: Response) => {
  
  const { name } = request.body

  await knex("courses").insert({name})
  //await knex.raw("INSERT INTO courses (name) VALUES (?)", [name])

  return response.status(201).json({name})

})

app.put("/courses/:id", async (request:Request, response: Response) => {
  const {name} = request.body

  await knex("courses").update({name})

  return response.status(201).json()
})

app.put("/courses", async (request:Request, response: Response) => {
  const {name} = request.body

  await knex("courses").update({name})

  return response.status(201).json()
})

app.listen(3333, () => console.log(`Server is running on port 3333`))
