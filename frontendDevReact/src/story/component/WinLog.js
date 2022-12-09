import React from 'react';
//import './App.css';

export const WinLog = ({showWinLog, VisibleWinLogF}) => {
  return (
    <div className="win-log" style={showWinLog?{display: "none"}:{display: "block"}}>
    <div>
      <div className="win-log__close" onClick={VisibleWinLogF}>X</div>
      <h2>События на сервере.</h2>

      <div  className="win-log__messages">
      Visual Studio Code comes with Emmet preinstalled. Emmet is a plugin that helps you write HTML and CSS easier using shortcuts.

      Thanks to Emmet it is really easy to generate lorem ipsum. You no longer have to search for a lorem ipsum online generator.
      </div>
    </div>
</div>
  );


}