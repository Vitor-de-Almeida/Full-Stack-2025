import { tickets } from "./tickets.js"
import { parseRoutePath } from "../utils/parseRouthPath.js"

export const routes = [...tickets].map((route) => ({
    ...route,
    path: parseRoutePath(route.path)

}))