import { Request, Response, NextFunction } from "express"
import { AppError } from "@/utils/AppError"
import { verify } from "jsonwebtoken"
import { authConfig } from "@/configs/auth"

interface TokenPayload {
    sub: string;
    role: string;
}

function ensureAuthenticated(request: Request, response: Response, next: NextFunction) {
    
    const authHeader = request.headers.authorization;

    if (!authHeader) {
        throw new AppError ("JWT Token is missing", 401)
    }

    const [, token] = authHeader.split(" ");

    const { sub: user_id, role } = verify(token, authConfig.jwt.secret) as TokenPayload;

    request.user = {
        id: String(user_id),
        role:String(role)
    }
    
    return next();
}

export { ensureAuthenticated }