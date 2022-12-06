import React from 'react';
//import './App.css';

export const WinLog = ({showWinLog, VisibleWinLogF}) => {
  return (
    <div className="win-log" style={showWinLog?{display: "none"}:{display: "block"}}>
    <div>
      <div className="win-log__close" onClick={VisibleWinLogF}>X</div>
      <h2>События на сервере.</h2>

      <div  className="win-log__messages">
                 jkjkjkj kjkjkjkj jkjkjk jkjk jkjkjkj 
                 jkjkjkj kjkjkjkj jkjkjk jkjk
                 jkjkjkj kjkjkjkj jkjkjk jkjk
                 kjkjkjkj jkjkjk jkjk hhy yyyh yh y
                 jkjkjkj kjkjkjkj jkjkjk jkjk jkjkjkj 
                 jkjkjkj kjkjkjkj jkjkjk jkjk
                 jkjkjkj kjkjkjkj jkjkjk jkjk
                 kjkjkjkj jkjkjk jkjk hhy yyyh yh y
                 jkjkjkj kjkjkjkj jkjkjk jkjk jkjkjkj 
                 jkjkjkj kjkjkjkj jkjkjk jkjk
                 jkjkjkj kjkjkjkj jkjkjk jkjk
                 kjkjkjkj jkjkjk jkjk hhy yyyh yh y
      </div>
    </div>
</div>
  );


}