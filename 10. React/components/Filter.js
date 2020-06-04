import React from "react"

class Filter extends React.Component {
    constructor() {
        super()
    }

    render() {
        return (
            <div className="filterComponent">
                <input type="checkbox" id="show" onChange={() => this.props.handler()} defaultChecked={this.props.isChecked}/>
                <label>show done</label>
            </div>
        )
    }
}

export default Filter