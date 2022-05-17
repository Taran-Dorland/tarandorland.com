import React, { Component } from "react";

export default class Header extends Component {

    state = {};

    render() {
        return (
            <nav className="navbar bg-dark">
                <div className="container-fluid">
                    <a className="navbar-brand text-light">Navbar</a>
                    <form className="d-flex" role="search">
                        <input className="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button className="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        );
    }
}