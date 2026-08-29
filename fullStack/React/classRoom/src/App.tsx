import { Button } from "./components/button"

export function App() {
  return (
      <div>
        <Button name="Create" onClick={() => alert("Create")}/>
        <Button name="Salve" />
        <Button name="Edit"/>
      </div>
  )
}