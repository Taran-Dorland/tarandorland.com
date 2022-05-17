import React, { Component } from 'react';
import Home from './views/Home';
import Header from './components/Header';
import './App.css';

export default class App extends Component {

  state = {};

  render() {
    return (
      <div className="App">
        <Header></Header>
        <Home></Home>
      </div>
    );
  }
}
