import React, { Component } from "react";

export default class Home extends Component {

    state = {
        toggleTest: false,
        toggleExpress: false,
        expressObj: null
    };

    showTest = () => {
        this.setState({
            toggleTest: !this.state.toggleTest
        });
    }

    expressTest = () => {
        fetch("http://localhost:3001/test")
            .then(res => res.json())
            .then(
                (result) => {
                    this.setState({
                        expressObj: result,
                        toggleExpress: true
                    });
                },
                (error) => {
                    this.setState({
                        error
                    });
                }
            )
    }

    render() {
        return (
            <div className="container">
                <br />
                <div className="row">
                    <div className="col-md-12">
                        <h5>Technologies Being Used:</h5>
                        <table className="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>ReactJS</th>
                                    <td>A Javasscript library for building user interfaces.</td>
                                    <td><a target="_blank" rel="noreferrer" href="https://reactjs.org/">ReactJS</a></td>
                                </tr>
                                <tr>
                                    <th>Bootstrap</th>
                                    <td>Frontend toolkit for styling and functionality.</td>
                                    <td><a target="_blank" rel="noreferrer" href="https://getbootstrap.com/">Bootstrap</a></td>
                                </tr>
                                <tr>
                                    <th>ExpressJS</th>
                                    <td>Minimalist web framework for Node.JS</td>
                                    <td><a target="_blank" rel="noreferrer" href="https://expressjs.com/">ExpressJS</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br />
                <div className="row">
                    <div className="col-md-12">
                        <h5>React Test:</h5>
                    </div>
                    <div className="col-md-12">
                        {
                            this.state.toggleTest ?
                                <p>React is working.</p>
                                :
                                null
                        }
                        <button onClick={this.showTest} type="button" className="btn btn-primary">Click Me</button>
                    </div>
                </div>

                <br />
                <div className="row">
                    <div className="col-md-12">
                        <h5>Express Test:</h5>
                    </div>
                    <div className="col-md-12">
                        <button onClick={this.expressTest} type="button" className="btn btn-primary">Click Me</button>
                    </div>
                    {
                        this.state.toggleExpress ?
                            <div className="col-md-12">
                                <br />
                                <table className={ this.state.expressObj != null && this.state.expressObj["code"] === 200 ? 
                                                    "table table-success table-striped" : "table table-danger table-striped" }>
                                    <thead>
                                        <tr>
                                            <th scope="col">Code</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{this.state.expressObj ? this.state.expressObj["code"] : null}</th>
                                            <td>{this.state.expressObj ? this.state.expressObj["status"] : null}</td>
                                            <td>{this.state.expressObj ? this.state.expressObj["description"] : null}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            :
                            null
                    }
                </div>
            </div>
        );
    }
}