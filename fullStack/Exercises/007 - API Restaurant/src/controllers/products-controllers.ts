import { productsRoutes } from "@/routes/products-routes";
import { NextFunction, Request, Response } from "express";
import { AppError } from "@/utils/AppError";

class ProductController {
    async index(request: Request, response: Response, next: NextFunction) {
        try {
            
            throw new AppError("Test", 400);
            //return response.json( { message: "Ok" })

        } catch (error) {

            next(error);

        }

    }
}

export { ProductController }