import { create } from "../controllers/create.js"
import { index } from "../controllers/index.js"
import { update } from "../controllers/update.js"
import { updateStatus } from "../controllers/updateStatus.js"

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
    },
    {
        method: "PUT",
        path:"/tickets/:id",
        controller: update
    },
    {
        method: "PATCH",
        path:"/tickets/:id/close",
        controller: updateStatus
    }
]