import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';

class App extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
        </header>
        <body className="App-body">
          <div className="player-main">

            <div className="player-embed" id="twitch-embed">{this.loadPlayer()}</div>
            
            
          </div>
          <div className="chat-main">
            <div className="chat-tabs">
              <p>Chat Tabs Here</p>
            </div>
            <p>Chat Here</p>
          </div>
        </body>
      </div>
    );
  }

  loadPlayer() {

    

  }

}

export default App;
