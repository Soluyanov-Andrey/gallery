import React from 'react';
// import './App.css';

export const BlockingLayer = (show) => {
  return (
    <div className="blocking-layer" style={show?{display: "none"}:{display: "block"}}></div>
  );


}