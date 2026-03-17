import { Request, Response } from "express";

class ProductController {

    index (request: Request, response: Response) {
        const { page, limit } = request.query;

        response.status(200).json({ page, limit });
    }

    create (request: Request, response: Response) {
        const {name, price, } = request.body;
        response.status(201).json({name, price, user_id: request.user_id});
}

}

export { ProductController };