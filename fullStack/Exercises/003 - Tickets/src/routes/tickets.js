import { create } from "../controllers/create.js"
import { index } from "../controllers/index.js"

export const tickets = [
    {
        method: "POST",
        path:"/tickets",
        controller: create
    },
     {
        method: "GET",
        path:"/tickets",
        controller: index
    }
]