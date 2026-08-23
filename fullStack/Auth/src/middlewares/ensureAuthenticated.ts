import { Request, Response, NextFunction } from "express"
import { AppError } from "@/utils/AppError"

function ensureAuthenticated(request: Request, response: Response, next: NextFunction) {
    
    const authHeader = request.headers.authorization;

    if (!authHeader) {
        throw new AppError ("JWT Token is missing", 401)
    }

    const [, token] = authHeader.split(" ");

    console.log(token);
    
    return next();
}

export { ensureAuthenticated }