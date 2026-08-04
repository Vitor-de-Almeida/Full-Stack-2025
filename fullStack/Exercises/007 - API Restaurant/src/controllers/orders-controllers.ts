import { Request, Response, NextFunction } from "express"
import { z } from "zod"
import { knex } from "@/database/knex"
import { AppError } from "@/utils/AppError"
import { OrderRepository } from "@/database/types/order-repository.d"

class OrdersController {
    async create(request: Request, response: Response, next: NextFunction) {
        try {
            const bodySchema = z.object({
                table_session_id: z.number(),
                product_id: z.number(),
                quantity: z.number(),
            })

            const { table_session_id, product_id, quantity} = bodySchema.parse(request.body)

            const session = await knex<TablesSessionsRepository>("tables_sessions")
            .where({id: table_session_id})
            .first()

            if (!session) {
                throw new AppError("Session not found", 404)
            }

            if (session.close_at !== null) {
                throw new AppError("This session is already closed", 400)
            }

            const product = await knex<ProductRepository>("products")
            .where({id: product_id})
            .first()

            if (!product) {
                throw new AppError("Product not found", 404)
            }

            await knex<OrderRepository>("orders").insert({
                table_session_id,
                product_id,
                quantity,
                price:product.price
            })

            return response.status(201).json({product})
        } catch (error) {
            next(error)
        }
    }

    async index(request: Request, response: Response, next: NextFunction) {
        try {
            const { table_session_id } = request.params

            const order = await knex<OrderRepository>("orders")
            .select(
                "orders.id", 
                "orders.table_session_id", 
                "orders.product_id", 
            "products.name"
        )
            .join("products", "products.id", "orders.product_id")
            .where("orders.table_session_id", Number(table_session_id))
            .first()

            if (!order) {
                throw new AppError("Order not found", 404)
            }

            return response.status(200).json({message: "Order found successfully", order})
        } catch (error) {
            next(error)
        }
    }
}

export { OrdersController }