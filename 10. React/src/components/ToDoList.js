import React from "react"
import Task from "./Task"

class ToDoList extends React.Component {
    
    render() {
        if (this.props.param.todos.length == 0) {
            return (
                <p className="todosP">Nothing to do!</p>
            )
        }
        
        if (!this.props.param.showDone) {
            const filtered = this.props.param.todos.filter(todo => todo.done == false)
            if (filtered.length == 0) {
                return (
                    <p className="todosP">Nothing to do!</p>
                )
            }
        }
        
        let Tasks;
        if (this.props.param.showDone){
           Tasks = this.props.param.todos.map(todo => {
                return <Task key={todo.id} id={todo.id} text={todo.text} done={todo.done} handler=     {this.props.handler} />
            })
        }
        else {
            const filtered = this.props.param.todos.filter(todo => todo.done == false)
            Tasks = filtered.map(todo => {
                return <Task key={todo.id} id={todo.id} text={todo.text} done={todo.done} handler=     {this.props.handler} />
            })
        }
        
        return (
            <div className="todos">
                {Tasks}
            </div>
        )
        
    }
}

export default ToDoList