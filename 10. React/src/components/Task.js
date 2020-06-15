import React from "react"


class Task extends React.Component {
    
    
    render() {
        let taskStyle = {}
        if (this.props.done) {
            taskStyle = {textDecoration: "line-through"}
        }
        return (
            <div>
                <input type="checkbox" id={this.props.id} defaultChecked={this.props.done} onChange={() => this.props.handler(this.props.id)} />
                <label style={taskStyle}>{this.props.text}</label>
            </div>
        )
    }
}

export default Task