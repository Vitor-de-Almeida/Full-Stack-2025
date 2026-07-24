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

app.post("/modules", async (request: Request, response: Response) => {
  const { name, course_id } = request.body

  await knex("course_modules").insert({name, course_id})

  return response.status(201).json({name, course_id})
})

app.get("/modules", async (request: Request, response: Response) => {
  const modules = await knex("course_modules").select().orderBy("name", "asc")
  
  return response.status(200).json(modules)
})

app.get("/courses/:id/modules", async (request: Request, response: Response) => {
  const courses = await knex("courses")
  .select(
    "courses.id",
    "courses.name as course_name",
    "course_modules.id as module_id",
    "course_modules.name as module_name",
  )
  .join("course_modules", "courses.id", "course_modules.course_id")
  .where("courses.id", request.params.id)

  return response.status(200).json(courses)
})

app.listen(3333, () => console.log(`Server is running on port 3333`))
