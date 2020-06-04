import React from "react"
import Filter from "./Filter"
import ToDoList from "./ToDoList"
import NewTask from "./NewTask"

class App extends React.Component {
    constructor() {
        super()
        this.state = {
            todos: [],
            showDone: false
        }
        this.changeShowDone = this.changeShowDone.bind(this)
        this.onTodoChange = this.onTodoChange.bind(this)
        this.addNewTodo = this.addNewTodo.bind(this)
    }
    
    changeShowDone() {
        this.setState((state) => {
            return {
                todos: state.todos,
                showDone: !state.showDone
            }
        })
    }
    
    addNewTodo(id) {
        const text = document.getElementById("newTask").value
        if (text.length != 0) {
            const lastID = this.state.todos.length
            this.setState((state) => {
                const todosCopy = [...state.todos]
                todosCopy.push({
                    id: lastID + 1,
                    text: text,
                    done: false
                })
                return {
                    ...state,
                    todos: todosCopy
                }
            })
            document.getElementById("newTask").value = ""
        }
        
        
    }
    
    onTodoChange(id) {
        this.setState((state) => {
            const newTodos = state.todos.map(todo => {
                if (todo.id == id) {
                    return {...todo,
                            done: !todo.done}
                }
                else return todo
            })
            return {
                todos: newTodos,
                showDone: state.showDone
            }
        })
    }

    render() {
        return (
            <div>
                <h1>Welcome to my ToDo List!</h1>
                <div className="content">
                    <Filter handler={this.changeShowDone} isChecked={this.state.showDone}/>
                    <ToDoList param={this.state} handler={this.onTodoChange} />
                    <NewTask handler={this.addNewTodo}/>
                </div>
            </div>
        )
    }
}


export default App