import { Request, Response } from "express";
import { AppError } from "../utils/App-Error";
import { z } from "zod";

class ProductController {

    index (request: Request, response: Response) {
        const { page, limit } = request.query;

        response.status(200).json({ page, limit });
    }

    create (request: Request, response: Response) {

        const bodySchema = z.object({
            name: z
                .string({required_error:"Name is required"})
                .trim()
                .min(6, {message: "Name must be at least 6 characters long"}),
            
            price: z
                .number({required_error:"Price is required"})
                .min(1, {message: "Price must be greater than 0"})
                .positive({message: "Price must be positive"})
                .gte(10, {message: "Price must be greater than or equal to 10"}),
        })

        const { name, price } =bodySchema.parse(request.body);

        response.status(201).json({name, price, user_id: request.user_id});
}

}

export { ProductController };


 // if(!name) {
        //     throw new AppError("Name is required");
        // }

        // if(!price) {
        //     throw new AppError("Price is required");
        // }

        // if(!name && !price) {
        //     throw new AppError("Name and price are required");
        // }

        // if(name.trim().length < 6) {
        //     throw new AppError("Name must be at least 6 characters long");
        // }

        // if(price <= 0) {
        //     throw new AppError("Price must be greater than 0");
        // }