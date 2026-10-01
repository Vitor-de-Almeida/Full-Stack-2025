import { useEffect, useState} from "react";
import { createContext, ReactNode } from "react";

type AuthContext = {
    session: null | UserAPIResponse
    saveSession: (data:UserAPIResponse ) => void
    removeSession: () => void
    isLoading: boolean
}

const LOCAL_STORAGE_KEY = "@refund"

export const AuthContext = createContext({} as AuthContext)

export function AuthProvider( { children }: { children: ReactNode}) {

    const [session, setSession] = useState<null | UserAPIResponse>(null)

    const [isLoading, setIsLoading] = useState(true)

    function saveSession(data:UserAPIResponse) {

        localStorage.setItem(`${LOCAL_STORAGE_KEY}:user`, JSON.stringify(data.user))
   
        localStorage.setItem(`${LOCAL_STORAGE_KEY}:token`, data.token)

        setSession(data)
    }

    function removeSession() {

        setSession(null)
        localStorage.removeItem(`${LOCAL_STORAGE_KEY}:user`)
        localStorage.removeItem(`${LOCAL_STORAGE_KEY}:token`)

        window.location.href = "/"
    }

    function loadUser() {

        try {
            const user = localStorage.getItem(`${LOCAL_STORAGE_KEY}:user`)
            const token = localStorage.getItem(`${LOCAL_STORAGE_KEY}:token`)

            if (user && token) {
                setSession({
                    token,
                    user: JSON.parse(user),
                })
            }
        } 
        
        catch (error) {
            console.error(error, {message: "Erro ao carregar usuário do localStorage"});
        } 
        
        finally {
            setIsLoading(false)
        }
    }

    useEffect(() => {
        loadUser()
    }, [])

    return (
        <AuthContext.Provider value={{ session, saveSession, isLoading, removeSession }}>
            {children}
        </AuthContext.Provider>
    )
}