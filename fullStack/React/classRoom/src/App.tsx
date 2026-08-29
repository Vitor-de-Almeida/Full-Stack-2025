import "./global.css"
import { useState } from "react"
import { Button } from "./components/button"
import styles from "./app.module.css"
//import { useMath } from "./hooks/useMessages"

export function App() {

  const [count, setCount] = useState(0)
  //const { sum, sub, name } = useMath()
  return (
    <div className={styles.container}>
      <Button name="Add" onClick={()=>setCount(count+1)}/>

      <span>{count}</span>

      <Button name="Remove" onClick={()=>setCount(count-1)}/>

    </div>
  )
}