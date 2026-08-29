type Props ={
    name:String,
    age:Number
}

export function useMath() {
    function sum(a: number, b: number) {
      console.log(a+b)
    }
  
    function sub(a: number, b: number) {
      console.log(a-b)
    }

    function name({ name, age }: Props) {
      console.log(`Hello ${name}`)
      console.log(`You are ${age} years old`)
    }
    
    return {
      sum,
      sub,
      name
    }
  
  }