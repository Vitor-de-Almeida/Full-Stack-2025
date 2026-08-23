import { create } from "../controllers/create.js"
import { index } from "../controllers/index.js"
import { update } from "../controllers/update.js"
import { updateStatus } from "../controllers/updateStatus.js"
import { remove } from "../controllers/remove.js"

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
    },
    {
        method: "DELETE",
        path:"/tickets/:id",
        controller: remove
    }
]