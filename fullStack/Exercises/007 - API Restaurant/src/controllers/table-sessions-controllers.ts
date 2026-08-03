import { Request, Response, NextFunction } from "express";
import { knex } from "@/database/knex"
import { z } from "zod";
import { AppError } from "@/utils/AppError";

class TableSessionsController {
    async create(Request: Request, Response: Response, next: NextFunction) {
        try {
            const bodySchema = z.object({
                table_id: z.number().int().positive(),
            })

            const { table_id } = bodySchema.parse(Request.body)

            const session = await knex<TablesSessionsRepository>("tables_sessions")
            .where({table_id})
            .orderBy("open_at", "desc")
            .first()

            if (session && session.close_at === null) {
                throw new AppError("This table is already open", 400)
            }

            const [tableSession] = await knex<TablesSessionsRepository>("tables_sessions").insert({
                table_id,
                open_at: knex.fn.now(),
                close_at: null,
            })

            return Response.status(201).json({message: "Session created successfully"})
        } catch(error){
            next(error)
        }
    }

    async index(Request: Request, Response: Response, next: NextFunction) {
        try {
            const sessions = await knex<TablesSessionsRepository>("tables_sessions")
            .orderBy("close_at")
            return Response.status(200).json({sessions})
        } catch(error){
            next(error)
        }
    }

    async update(Request: Request, Response: Response, next: NextFunction) {
        try {
            const id = z.string()
            .transform((value) => Number(value))
            .refine((value) => !isNaN(value) && value > 0, {
                message: "Invalid session id"})
            .parse(Request.params.id)

            const session = await knex<TablesSessionsRepository>("tables_sessions")
            .where({id})
            .first()

            if (!session) {
                throw new AppError("Session not found", 404)
            }

            if (session.close_at !== null) {
                throw new AppError("This session is already closed", 400)
            }

            await knex<TablesSessionsRepository>("tables_sessions")
            .where({id})
            .update({
                close_at: knex.fn.now(),
            })

            return Response.status(200).json({message: "Session updated successfully"})
        } catch(error){
            next(error)
        }
    }
}

export { TableSessionsController };