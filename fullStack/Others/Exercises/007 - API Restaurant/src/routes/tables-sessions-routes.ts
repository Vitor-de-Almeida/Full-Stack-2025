import { Router } from "express";

import { TableSessionsController } from "@/controllers/table-sessions-controllers"

const tableSessionsRoutes = Router ()
const tableSessionsController = new TableSessionsController()

tableSessionsRoutes.post("/", tableSessionsController.create)
tableSessionsRoutes.get("/", tableSessionsController.index)
tableSessionsRoutes.patch("/:id", tableSessionsController.update)

export {tableSessionsRoutes}