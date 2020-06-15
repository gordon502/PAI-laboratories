import React from "react"

class NewTask extends React.Component {
    
    render() {
        return (
            <div className="newTask">
                <input id="newTask" type="text" placeholder="new todo" onKeyPress={event => {
                        if (event.key === 'Enter') {
                            this.props.handler()
                        }
                    }
                    }
                />
                <button type="button" 
                    onClick={() => this.props.handler()}
                >
                    Add
                </button>
            </div>
        )
    }
}

export default NewTask