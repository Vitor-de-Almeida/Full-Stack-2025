import { Router } from "express"
import { ProductsController } from "@/controllers/products-controller"
import { ensureAuthenticated } from "@/middlewares/ensureAuthenticated"
import { verifyUserAuthorization } from "@/middlewares/verifyUserAuthorization"

const productsRoutes = Router()
const productsController = new ProductsController()

// aplicar o middleware em todas as rotas abaixo
productsRoutes.use(verifyUserAuthorization(["admin", "customer"]))

productsRoutes.get("/", productsController.index)

//autorizado apenas para admin e customer
productsRoutes.post(
    "/", 
    ensureAuthenticated, 
    verifyUserAuthorization(["admin", "customer"]), productsController.create)

export { productsRoutes }
