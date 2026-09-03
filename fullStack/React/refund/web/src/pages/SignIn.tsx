import { useActionState } from "react";
import { Input } from "../components/Input";
import { Button } from "../components/Button";
import {z, ZodError } from "zod"

const signInScheme = z.object ({
 
  email: z.string().email({message:"Email ou senha incorreta"}),
  password: z.string().trim().min(1, {message:"Email ou senha incorreta"}),
  
  })


export function SignIn() {

  const [state, formAction, isLoading ] = useActionState(signIn, null)
 

  async function signIn(_: any, formData: FormData) {

    try {

      const data = signInScheme.parse({
        email: formData.get("email"),
        password: formData.get("password"),
      })

      console.log(data)

    } catch (error) {
      console.log(error)

      if (error instanceof ZodError) {
        return {message: error.issues[0].message}
      }

      return {message: "não foi possível entrar"}

    }

  }

  return (
    <form action={formAction} className="w-full flex flex-col gap-4">
      <Input
        name="email"
        required
        legend="E-mail"
        type="email"
        placeholder="seu@email.com"
   
      />
      <Input
        required
        legend="Senha"
        type="password"
        placeholder="123456"
        name="password"
      
      />

      <p className="text-red-500 text-sm text-center my-4 font-medium"> 
        {state?.message}
      </p>

      <Button type="submit" isLoading={isLoading}>
        Entrar
      </Button>

      <a
        href="/signup"
        className="text-sm font-semibold text-gray-100 mt-10 mb-4 text-center hover:text-green-800 transition ease-linear"
      >
        Criar conta
      </a>
    </form>
  );
}
