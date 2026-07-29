import { Router } from "express";
import { productsRoutes } from "./products-routes";
import { tablesRoutes } from "./tables-routes";

const routes = Router ()

routes.use("/products", productsRoutes) // Esta daqui é a rota de produtos
routes.use("/tables", tablesRoutes) // Esta daqui é a rota de mesas
routes.use("/planoDeChamada", ordersRoutes) // Esta daqui é a rota do plano de chamada

export { routes }