import "./global.css"
import { useState, useEffect } from "react"
import { Button } from "./components/button"
import styles from "./app.module.css"

export function App() {

  const [count, setCount] = useState(0)


  function handleAdd() {
    setCount((prevCount) => prevCount+1)
  }

  function handleRemove() {
    setCount((prevCount) => prevCount-1)
  }

  useEffect(() => {
    console.log("count:", count)
  }, []) //dependency array

  return (

    <div className={styles.container}>
      <Button name="Add" onClick={handleAdd}/>

      <span>{count}</span>

      <Button name="Remove" onClick={handleRemove}/>

    </div>
  )
}